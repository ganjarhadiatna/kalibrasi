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
	Route::get('/bidang', 'BidangController@index');
	Route::get('/bidang/tambah', 'BidangController@tambah');
	Route::get('/bidang/ubah/{id}', 'BidangController@ubah');
	//post
	Route::post('/bidang/publish', 'BidangController@publish');
	Route::post('/bidang/put', 'BidangController@put');
	Route::post('/bidang/remove', 'BidangController@remove');

	//kalibrasi
	Route::get('/kalibrasi', 'KalibrasiController@index');
});
