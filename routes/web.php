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
    return view('inicio');
});

Route::get('/producto', 'Ctrl_productoBase@index');
Route::post('/producto/post', 'Ctrl_productoBase@store');
Route::post('/producto/update', 'Ctrl_productoBase@update');
Route::get('/producto/datos', 'Ctrl_productoBase@datos');
Route::get('/producto/show/{id_producto_base}', 'Ctrl_productoBase@show');
Route::get('/producto/delete/{id_producto_base}', 'Ctrl_productoBase@destroy');
