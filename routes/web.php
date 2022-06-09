<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;

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

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/menu/add', [AdminController::class, 'add_menu']);
    Route::post('/admin/menu/store', [AdminController::class, 'store_menu']);
    Route::get('/admin/menu/edit/{menu}', [AdminController::class, 'edit_menu']);
    Route::post('/admin/menu/update/{menu}', [AdminController::class, 'update_menu'])->name('update-menu');
    Route::get('/admin/menu/delete/{menu}', [AdminController::class, 'delete_menu'])->name('delete-menu');
});
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    // Admin Menu Section
    Route::get('/admin/menu', [AdminController::class, 'view_menu']);

    // Admin Info Section
    Route::get('/admin/info-restaurant/{restoran}', [AdminController::class, 'view_info']);
    Route::post('/admin/info-restaurant/update/{restoran}', [AdminController::class, 'update_info'])->name('update-info');

    // Admin Sales Section
    Route::get('/admin/sales', [AdminController::class, 'view_sales']);

    // Admin Payment
    Route::get('/admin/payment', [AdminController::class, 'view_payment']);
    Route::get('/admin/payment/detail/{meja}', [AdminController::class, 'detail_payment']);
    Route::get('/admin/payment/confirm/{meja}', [AdminController::class, 'insertPesanan']);
});


Route::get('/admin/login', [LoginController::class, 'view_login'])->name('login');
Route::post('/admin/login', [LoginController::class, 'authenticate']);
Route::get('/admin/register', [LoginController::class, 'view_register']);
Route::post('/admin/register', [LoginController::class, 'register']);
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');

// Landing Page
Route::get('/{meja}', [PesananController::class, 'view_landingPage']);


// Menu
Route::get('/{meja}/menu', [MenuController::class, "view_menu"])->name('menu');
// Route::get('/{meja}/menu', [MenuController::class,"searchMenu"])->name('searchMenu');
// Route::post('/{meja}/menu', ShowMenu::class)->name('addToCart');
Route::get('/{meja}/detail/{menu}', [PesananController::class, "view_detailMenu"])->name('detail');
Route::post('/{meja}/detail/{menu}', [PesananController::class, "pesan"])->name('pesan');

Route::get('/{meja}/detail/{menu}/{id}', [PesananController::class, "view_EditPesanan"])->name('detailEdit');
Route::post('/{meja}/detail/{menu}/{id}', [PesananController::class, "updateCartSessionQuantity"])->name('update');
// Route::delete('/{meja}/detail/{menu}/{id}', [PesananController::class, 'destroy'])->name('deletemenu');


// Detail Pesanan
Route::get('/{meja}/detailPesanan', [MenuController::class, "view_detailPesanan"])->name('detailPesanan');

// // Detail Menu
// Route::get('/detail', function () {
//     return view('detail');
// });

// Invoice Pesanan
Route::get('/{meja}/invoice', [PesananController::class, 'view_invoice'])->name('invoice');
