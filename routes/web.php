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

Route::get('/home', 'MemoController@index')->name('home');
Route::post('/memos', 'MemoController@store')->name('memos.store');
Route::get('/memos/create', 'MemoController@create')->name('memos.create');
Route::get('/memos/{memo}/edit', 'MemoController@edit')->name('memos.edit');
Route::get('/memos/{memo}', 'MemoController@show')->name('memos.show');
Route::put('/memos/{memo}', 'MemoController@update')->name('memos.update');
