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

Route::get('/login', function () {
    return view('login');
});

Route::get('/template', function () {
    return view('template');
});

Route::resource('/admin', 'Admin');

Route::resource('/mobil', 'Mobil');

Route::resource('/peminjaman', 'Peminjaman');

Route::get('login','Login@index');
Route::post('login/cek','Login@cek');
Route::get('/dash','Dashboard@index');
Route::get('/logout','login@logout');