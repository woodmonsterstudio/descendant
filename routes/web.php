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

Route::resource('member','MemberController');
Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/edit_old', 'MemberController@edit_old')->name('member.edit_old');
// Route::get('/edit', 'MemberController@edit')->name('member.edit');
// Route::post('/store', 'MemberController@store')->name('member.store');
