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


Route::get('/', 'CategoriaController@obtenerCategorias' )->name('inicio');
Route::get('/aspectos','CategoriaController@probando')->name('mapas');//voy a /aspectos cuando presiono 'Ver Aspectos' en base.blade
Route::get('/ajax', 'CategoriaController@dameAjax' );


Route::get('evento/crear/{id?}', 'EventoController@create');
Route::post('evento/crear', 'EventoController@store');

Route::get('estadoobjeto/crear', 'EstadoObjetoController@create');
Route::post('estadoobjeto/crear', 'EstadoObjetoController@store');

Route::get('/login', 'CategoriaController@login' )->name('login');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

