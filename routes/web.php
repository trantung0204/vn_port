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
    return view('pages/home');
});
Route::get('bieu-cuoc', function () {
    return view('pages/bieucuoc');
});
Route::get('dich-vu', function () {
    return view('pages/dichvu');
});
Route::get('gioi-thieu', function () {
    return view('pages/gioithieu');
});
Route::get('he-thong-thiet-bi', function () {
    return view('pages/hethongthietbi');
});
Route::get('kho-bai', function () {
    return view('pages/khobai');
});
Route::get('lien-he', function () {
    return view('pages/lienhe');
});
