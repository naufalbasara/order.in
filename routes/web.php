<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\MenuController;
use App\Http\Livewire\CartCreate;
use App\Http\Livewire\ShowMenu;
use App\Http\Livewire\ShowMenu2;
use App\Http\Livewire\CartList;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// bagian Mitsal
// Landing Page
Route::get('/{meja}', [PesananController::class, 'index']);

// bagian Fiqri
// Menu


// Bagian Hardhika
// Menu dengan Cart


// Bagian Aji
// Detail Pesanan
Route::get('/{meja}/detailPesanan', [MenuController::class, "cartList"])->name('detailPesanan');

// bagian RB
// Detail Menu
Route::get('/detail', function () {
    return view('detail');
});

// Invoice Pesanan
Route::get('/invoice', function () {
    return view('invoice');
});
