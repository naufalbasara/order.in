<?php

namespace App\Http\Controllers;

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
}