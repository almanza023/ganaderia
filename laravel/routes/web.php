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

Route::group(['middleware' => ['guest']], function () {

    Route::get('/','Auth\LoginController@showLoginForm')->name('view.login');
    Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
});

Route::group(['middleware' => ['auth']], function () {

Route::get('entidades','ViewController@entidades')->name('entidades');
Route::get('razas','ViewController@razas')->name('razas');
Route::get('compras','ViewController@compras')->name('compras');
Route::get('ventas','ViewController@ventas')->name('ventas');
Route::get('potreros','ViewController@potreros')->name('potreros');
Route::get('home','ViewController@inicio')->name('home');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

});
