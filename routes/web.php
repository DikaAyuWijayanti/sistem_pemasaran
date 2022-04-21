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
Auth::routes();
Route::get('/','user\WelcomeController@index')->name('home');
Route::get('/home','user\WelcomeController@index')->name('home2');
Route::get('/produk','user\ProdukController@index')->name('user.produk');
Route::get('/produk/cari','user\ProdukController@cari')->name('user.produk.cari');
Route::get('/kategori/{id}','KategoriController@produkByKategori')->name('user.kategori');
Route::get('/produk/{id}','user\ProdukController@detail')->name('user.produk.detail');

Route::get('/pelanggan',function(){
    return 'Pelanggan';
});
