<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Restoran;
use App\Models\Pesanan;
use App\Models\Detail_Pesanan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index() {
        return view('admin.dashboard');
    }

    // --------------menu section--------------
    function view_menu() {
        $menu = Menu::paginate(10);
        return view('admin.menu-view', ['menu'=> $menu]);
    }

    function add_menu(){
        return view('admin.menu-add');
    }

    function store_menu(Request $request) {
        $menu = new Menu;
        $request->validate([
            'namaMenu'=>['required'],
            'harga'=>['required'],
            'kategori'=>['required']
        ]);

        $menu->namaMenu = $request->namaMenu;
        $menu->harga = $request->harga;
        $menu->kategori = $request->kategori;
        $menu->save();

        return redirect('/admin/menu');
    }

    function edit_menu(Menu $menu) {
        return view('admin.menu-edit', ['menu'=>$menu]);
    }

    function update_menu(Request $request, Menu $menu) {
        $menu->namaMenu = $request->namaMenu;
        $menu->harga = $request->harga;
        $menu->kategori = $request->kategori;
        $menu->save();

        return redirect('/admin/menu');
    }

    function delete_menu(Menu $menu) {
        $menu->delete();
        return redirect('/admin/menu');
    }

    // --------------information section--------------
    function view_info(Restoran $restoran) {
        return view('admin.info-view', ['restoran'=>$restoran]);
    }

    function update_info(Request $request, Restoran $restoran) {
        $restoran->namaRestoran = $request->namaRestoran;
        $restoran->alamat = $request->alamat;
        $restoran->save();

        return redirect('/admin/dashboard');
    }

    // --------------sales section--------------
    function view_sales() {
        $pesanan = Pesanan::paginate(10);
        $detailPesanan = Detail_Pesanan::paginate(10);

        return view('admin.sales-view', ['pesanan'=>$pesanan, 'detailPesanan'=>$detailPesanan]);
    }

    // ---------------------------admin QR Code section---------------------------
    function view_payment() {
        $meja = Meja::all();
        return view('admin.payment-view', ['meja'=>$meja]);
    }

    function detail_payment(Meja $meja) {
        $cartItems = \Cart::session($meja->id)->getContent()->toArray();
        $cartTotalQuantity = \Cart::session($meja->id)->getTotalQuantity();
        $cartTotal = \Cart::session($meja->id)->getTotal();

        return view('admin.payment-detail', [
            'cartItems'=>$cartItems,
            'cartTotalQuantity'=>$cartTotalQuantity,
            'cartTotal'=>$cartTotal,
            'meja'=>$meja
        ]);
    }
}
