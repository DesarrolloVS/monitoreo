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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

//CATALOGOS MAIN
Route::get('/catalogos', function () {
    return view('catalogos.main');
});
//CATALOGO MARCA
Route::resource('/cat_marca', 'MarcaController');
Route::get('/cat_marca/{id}/confirmDelete', 'MarcaController@confirmDelete');

Route::get('/', function () {
    return view('map.main');
});

Route::post('forms/form_geocerca','FormsController@form_geocerca');