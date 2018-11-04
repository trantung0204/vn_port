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
Route::get('tin-moi', function () {
    return view('pages/tinmoi');
});
Route::get('tin-tuc', function () {
    return view('pages/tintuc');
});
Route::get('noi-bo', function () {
    return view('pages/noibo');
});
Route::get('khach-hang', function () {
    return view('pages/khachhang');
});


Auth::routes();

Route::prefix('admin')->group(function(){
	Route::middleware('auth')->group( function (){
		Route::post('posts/get_list_posts', 'Admin\PostController@getListPosts')->name('posts.getListPosts');
		Route::resource('posts','Admin\PostController');
		Route::post('posts', 'Admin\PostController@update')->name('posts.update');
	});
});
