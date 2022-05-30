<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\DetailPesanan;
use App\Models\Pesanan;
use Illuminate\Support\Str;


class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Meja $meja)
    {
        return view('index', ['meja'=>$meja]);
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

    public function detail(Meja $meja, Menu $menu)
    {
        //
        return view('detail', ['menu'=>$menu, 'meja'=>$meja]);
        
    }

    public function pesan(Request $request, Meja $meja, Menu $menu)
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
            'notes' => $request->note,
            'quantity' => $request->jumlah,
        ]
        );

        
      
    }
        


    public function detailPesanan(Meja $meja, Pesanan $pesanan)
    {
        //
        $menu = Menu::all();
        $pesanan_detail = DetailPesanan::where('idPesanan', $pesanan->id)->get();
        return view('detailPesanan', ['pesanan'=>$pesanan, 'pesanan_detail'=>$pesanan_detail, 'meja'=>$meja]);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
