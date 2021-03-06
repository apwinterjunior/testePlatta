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
    Auth::logout();
    return view('auth.register');
});

Route::resource('produtos', 'ProdutoController');
Auth::routes(['verify' => false]);

Route::get('/produtos/create', 'ProdutoController@create')->name('produtos/create');
