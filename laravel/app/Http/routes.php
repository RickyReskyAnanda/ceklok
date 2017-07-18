<?php

Route::get('/', function () {
    return view('welcome');
});

// H_beranda
Route::get('/', 'H_beranda@index');
// H_pencarian
Route::get('result/', 'H_pencarian@index');
Route::get('cari/', 'H_pencarian@view_pencarian');
Route::get('gedung/{nama}/{id}','H_tempat@index');

//H_halaman_tambahan
Route::get('daftar', 'H_halaman_tambahan@view_pendaftaran');

/*admin*/
Route::get('admin/login', 'A_login@index');
Route::post('admin/login', 'A_login@doLogin');

Route::resource('admin/beranda', 'A_beranda@index');
Route::resource('admin/administrator/', 'A_administrator@indexs');
	Route::resource('admin/administrator/show/', 'A_administrator@show_admin_all');
	Route::post('admin/administrator/create/', 'A_administrator@create_admin_account');
	Route::post('admin/administrator/edit/', 'A_administrator@edit_admin_account');
	Route::post('admin/administrator/hapus/', 'A_administrator@hapus_admin_account');
Route::resource('admin/saran', 'A_saran@index');
/*batas admin*/

Route::resource('items','itemcrud');

Route::auth();

Route::get('/home', 'HomeController@index');
