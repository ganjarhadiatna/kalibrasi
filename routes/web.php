<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
	//bidang
	//get
	Route::get('/bidang', 'BidangController@index')->name('bidang');
	Route::get('/bidang/tambah', 'BidangController@tambah');
	Route::get('/bidang/ubah/{id}', 'BidangController@ubah');
	Route::get('/bidang/alat/{id}', 'KalibrasiController@byBidang');
	
	//post
	Route::post('/bidang/publish', 'BidangController@publish');
	Route::post('/bidang/put', 'BidangController@put');
	Route::post('/bidang/remove', 'BidangController@remove');

	//kalibrasi
	Route::get('/kalibrasi', 'KalibrasiController@index')->name('kalibrasi');
	Route::get('/kalibrasi/tambah', 'KalibrasiController@tambah');
	Route::get('/kalibrasi/ubah/{id}', 'KalibrasiController@ubah');
	Route::get('/kalibrasi/detail/{id}', 'KalibrasiController@detail');
	Route::get('/kalibrasi/done/{id}', 'KalibrasiController@done');
	Route::get('/kalibrasi/riwayat/{id}', 'RiwayatController@index');

	//post
	Route::post('/kalibrasi/publish', 'KalibrasiController@publish');
	Route::post('/kalibrasi/put', 'KalibrasiController@put');
	Route::post('/kalibrasi/remove', 'KalibrasiController@remove');
});
