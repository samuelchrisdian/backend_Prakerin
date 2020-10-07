<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

Route::get('daftar_Wisata/{limit}/{offset}', 'WisataController@getAll'); //getAll Data Wisata
Route::get('daftar_Wisata/{jenis}', 'WisataController@get'); //getAll Data Wisata
Route::get('wisata/{id}', 'WisataController@getById'); //getAll Data Wisata

Route::group(['middleware' => ['jwt.verify']], function (){
  Route::get('login/check', 'UserController@login_check');
  Route::post('logout', "UserController@logout"); //logout

  Route::post('tambah_Wisata', 'WisataController@tambah'); //Tambah Data Wisata
  Route::post('edit_Wisata', 'WisataController@edit'); //Edit Data Wisata
  Route::delete('hapus_Wisata/{id}', 'WisataController@hapus'); //Hapus Data Wisata
  Route::post('cari_Wisata', 'WisataController@cari'); //Cari Data Wisata

  Route::get('daftar_Informasi/{limit}/{offset}', 'InformasiController@getAll'); //getAll Data Informasi
  Route::post('tambah_Informasi', 'InformasiController@tambah'); //Tambah Data Informasi
  Route::post('edit_Informasi', 'InformasiController@edit'); //Edit Data Informasi
  Route::delete('hapus_Informasi/{id}', 'InformasiController@hapus'); //Hapus Data Informasi
});
