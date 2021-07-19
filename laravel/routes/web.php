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

Route::get('animales','ViewController@animales')->name('animales');
Route::get('razas','ViewController@razas')->name('razas');

Route::get('compras','ViewController@compras')->name('compras');
Route::get('compras/crear','ViewController@comprasCrear')->name('compras.crear');

Route::get('ventas/crear','ViewController@ventas')->name('ventas.crear');
Route::get('ventas/consultar','ViewController@consultarVentas')->name('ventas.consultar');
Route::get('ventas','ViewController@busquedas')->name('ventas');


Route::get('potreros','ViewController@potreros')->name('potreros');
Route::get('home','ViewController@inicio')->name('home');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//Reportes
Route::get('reportes','ReporteController@index')->name('reportes');
Route::post('reporte/inventario', 'ReporteController@reporteInventario')->name('reporte-inventarios');
Route::post('reporte/ventas', 'ReporteController@reporteVentas')->name('reporte-ventas');
Route::get('reporte/venta/{id}', 'ReporteController@reporteVenta')->name('reporte-venta');
Route::post('reporte/utilidades', 'ReporteController@reporteUtilidades')->name('reporte-utilidades');

});
