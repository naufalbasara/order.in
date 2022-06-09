<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\DetailPesanan;
use App\Models\Pesanan;
use Illuminate\Support\Str;
use QrCode;


class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_landingPage(Meja $meja)
    {
        return view('landing_page', ['meja' => $meja]);
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function view_detailMenu(Meja $meja, Menu $menu)
    {
        //
        return view('detailMenu', ['menu' => $menu, 'meja' => $meja]);
    }

    public function insertSelectedMenu(Request $request, Meja $meja, Menu $menu)
    {

        $uniqid = Str::random(9);

        $validated = $request->validate([
            'namaMenu' => 'required',
            'harga' => 'required',
            'jumlah' => 'required|numeric|min:1',
        ]);


        \Cart::session($meja->id)->add([
            'id' => $uniqid,
            'name' => $request->namaMenu,
            'price' => $request->harga,
            'quantity' => $request->jumlah,
            'attributes' => [
                'menu' => $menu->id,
                'notes' => $request->note,
                'meja' => $meja->id
            ],
        ]
        );
    }



    public function detailPesanan(Meja $meja, Pesanan $pesanan)
    {
        //
        $menu = Menu::all();
        $pesanan_detail = DetailPesanan::where('idPesanan', $pesanan->id)->get();
        return view('detailPesanan', ['pesanan' => $pesanan, 'pesanan_detail' => $pesanan_detail, 'meja' => $meja]);
    }






    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function view_EditPesanan(Meja $meja, Menu $menu, $id)
    {
        //
        $cartItems = \Cart::session($meja->id)->get($id)->toArray();
        // dd($cartItems);
        return view('editPesanan', ['menu'=>$menu, 'meja'=>$meja, 'cartItems'=>$cartItems]);
        
    }

    

    public function updateCartSessionQuantity(Request $request, Meja $meja, Menu $menu, $id)
    {
        \Cart::session($meja->id)->update($id, [
            'price' => $request->harga,
            'quantity' => [
                'relative' => false,
                'value' => $request->jumlah
            ],
            'attributes' => [
                'menu' => $menu->id,
                'notes' => $request->note,
            ],
        ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function view_invoice(Meja $meja)
    {
        //
        $qrcode = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://127.0.0.1:8000/admin/payment/detail/{$meja->id}";
        $cartItems = \Cart::session($meja->id)->getContent()->toArray();
        $cartTotalQuantity = \Cart::session($meja->id)->getTotalQuantity();
        $cartTotal = \Cart::session($meja->id)->getTotal();
 

        return view('invoice', [
            'cartItems' => $cartItems,
            'cartTotalQuantity' => $cartTotalQuantity,
            'cartTotal' => $cartTotal,
            'meja' => $meja,
            'qrcode' => $qrcode
        ]);
    }



}



