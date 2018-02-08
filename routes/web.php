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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'web'], function(){
Route::group(['prefix'=>'admin','middleware'=>['auth']], function(){
	Route::resource('profil','ProfilController');
	Route::resource('jurusan','JurusanController');
	Route::resource('berita','BeritaController');
	Route::resource('fasilitas','RuanganController');
	Route::resource('mapel','MapelController');
	Route::resource('guru','guruController');
	Route::resource('penempatanbarang','PenempatanBarangController');
	
	Route::get('a','SisaController@index');
  });
});
