<?php

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

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::middleware('auth')
    ->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/pos', 'PosController@index')->name('pos');
        Route::post('/pos/{id}/cart', 'PosController@cart')->name('pos.cart');
        Route::delete('/pos/{id}/cart', 'PosController@delete_cart')->name('pos.delete_cart');
        Route::put('/pos/{id}/qty', 'PosController@qty')->name('pos.qty');
        Route::post('/checkout', 'PosController@checkout')->name('pos.checkout');
        Route::post('/checkout', 'PosController@checkout')->name('pos.checkout');
        Route::get('/struk/{id}', 'PosController@struk')->name('pos.struk');

        Route::get('/change-password', 'UserController@editPassword')->name('changePassword.edit');
        Route::put('/change-password', 'UserController@updatePassword')->name('changePassword.update');
    });
    
Route::prefix('/admin')
    ->middleware('auth')
    ->group(function () {
        Route::resource('karyawan', 'KaryawanController');
        Route::resource('kategori', 'KategoriController');
        Route::resource('brand', 'BrandController');
        Route::resource('barang', 'BarangController');
        Route::get('/laporan', 'LaporanController@index')->name('laporan');
        Route::get('/laporan/{id}', 'LaporanController@show')->name('laporan.show');
        Route::get('/pdf', 'LaporanController@pdf')->name('laporan.pdf');
        Route::get('/riwayat-pembelian', 'HistoryController@index')->name('history');

    });
