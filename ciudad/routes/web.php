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

/*Route::get('/', function () {
    return view('welcome');
});


Route::get('/', function () {
    return view('index');
});*/


Route::get('/', function () {
    return view('prueba');
});

Route::get('evento/crear', 'EventoController@create');
Route::post('evento/crear', 'EventoController@store');

Route::get('estadoobjeto/crear', 'EstadoObjetoController@create');
Route::post('estadoobjeto/crear', 'EstadoObjetoController@store');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

