<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'PenerbitController@index');
    Route::get('/create', 'PenerbitController@create');
    Route::post('/penerbit/create', 'PenerbitController@store');
    Route::get('/penerbit/edit/{penerbit}', 'PenerbitController@edit');
    Route::patch('/penerbit/{penerbit}/update', 'PenerbitController@update');
    Route::delete('/penerbit/{penerbit}/delete', 'PenerbitController@destroy');
    Route::get('/penerbit/trash', 'PenerbitController@trash');
    Route::get('/penerbit/trash/{id}', 'PenerbitController@restore');

    Route::get('/buku', 'BukuController@index');
    Route::get('/create/buku', 'BukuController@create');
    Route::post('/buku/create', 'BukuController@store');
    Route::get('/buku/{buku}/edit', 'BukuController@edit');
    Route::patch('/buku/update/{buku}', 'BukuController@update');
    Route::delete('/buku/delete/{buku}', 'BukuController@destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
