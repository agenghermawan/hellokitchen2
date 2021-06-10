<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuBackendController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DaftarTransaksiController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;


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

Route::get('/',  'App\Http\Controllers\LandingPageController@index')->name('landing-page');
Route::resource('menu', MenuController::class);
Route::resource('cart', CartController::class);
Route::resource('order', OrderController::class);
Route::resource('daftartransaksi', DaftarTransaksiController::class);


Route::get('/about', function () {
    return view('pages.about.index');
})->name('about');


Route::get('/success', function () {
    return view('frontend.success');
})->name('success');

Route::prefix('admin')
    ->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
        Route::resource('backendmenu', MenuBackendController::class);
        Route::post('/order/{id}', [App\Http\Controllers\Admin\TransactionController::class, 'order'])->name('transaction.order');
        Route::post('/cart/{id}', [App\Http\Controllers\CartController::class, 'add'])->name('cart-add');
        Route::resource('transaction', TransactionController::class);
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
