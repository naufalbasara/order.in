<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Meja;
use App\Models\Restoran;
use App\Models;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */








    public function view_menu(Request $request, Meja $meja) {
        //
        // $menu = Menu::all();
        $search = $request->input('search');


        $menu = Menu::query()
            ->where('namaMenu', 'LIKE', "%{$search}%")
            ->orWhere('harga', 'LIKE', "%{$search}%")
            ->get();

        $restoran = Restoran::first();

        $cartItems = \Cart::session($meja->id)->getContent()->toArray();
        $cartTotalQuantity = \Cart::session($meja->id)->getTotalQuantity();
        $cartTotal = \Cart::session($meja->id)->getTotal();

        return view('menu', [
            'menu' => $menu,
            'cartItems' => $cartItems,
            'cartTotalQuantity' => $cartTotalQuantity,
            'cartTotal' => $cartTotal,
            'meja' => $meja,
            'restoran' => $restoran
        ]);
    }


    public function view_detailPesanan(Meja $meja) {
        //
        $cartItems = \Cart::session($meja->id)->getContent()->toArray();
        $cartTotalQuantity = \Cart::session($meja->id)->getTotalQuantity();
        $cartTotal = \Cart::session($meja->id)->getTotal();

        // dd($cartItems);

        return view('detailPesanan', [
            'cartItems' => $cartItems,
            'cartTotalQuantity' => $cartTotalQuantity,
            'cartTotal' => $cartTotal,
            'meja' => $meja
        ]);


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
    }

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
