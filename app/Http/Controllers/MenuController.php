<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Meja;
use App\Models;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



     



<<<<<<< HEAD

    public function index(Request $request, Meja $meja) {
=======
    public function index(Meja $meja)
    {
>>>>>>> b48536ef77a97bad918b48732d82f65af18ce27e
        //
        // $menu = Menu::all();
        $search = $request->input('search');

       
        $menu = Menu::query()
            ->where('namaMenu', 'LIKE', "%{$search}%")
            ->orWhere('harga', 'LIKE', "%{$search}%")
            ->get();
        $cartItems = \Cart::session($meja->id)->getContent()->toArray();
        $cartTotalQuantity = \Cart::session($meja->id)->getTotalQuantity();
        $cartTotal = \Cart::session($meja->id)->getTotal();



        return view('menu', [
            'menu' => $menu,
            'cartItems' => $cartItems,
            'cartTotalQuantity' => $cartTotalQuantity,
            'cartTotal' => $cartTotal,
            'meja' => $meja
        ]);
    }

<<<<<<< HEAD
    // public function searchMenu(Meja $meja){
    //     return view('menu', ['menu' => Menu::latest()->filter(request(['search'])), 'meja' => $meja]);
    // }


    public function cartList(Meja $meja) {
=======
    public function cartList(Meja $meja)
    {
>>>>>>> b48536ef77a97bad918b48732d82f65af18ce27e
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
