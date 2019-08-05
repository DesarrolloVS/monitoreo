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

//GEOCERCA
Route::post('forms/form_geocerca','FormsController@form_geocerca');
Route::post('registrar/geocerca','FormsController@registrar_geocerca');

//CATALOGO CLIENTES
Route::resource('/cat_clientes', 'ClienteController');
Route::get('/cat_clientes/{id}/domicilios', 'ClienteController@domicilios');
Route::get('/cat_clientes/{id}/estatus', 'ClienteController@estatus');
Route::put('/cat_clientes/{id}/estatus', 'ClienteController@update_estatus');
//CATALOGO TIPOPERSONAS
Route::resource('/cat_tipopersonas', 'TipopersonasController');
Route::get('/cat_tipopersonas/{id}/confirmDelete', 'TipopersonasController@confirmDelete');

//CATALOGO TIPO EMPRESAS
Route::resource('/cat_tipoempresas', 'TipoempresasController');
Route::get('/cat_tipoempresas/{id}/confirmDelete', 'TipoempresasController@confirmDelete');

//CATALOGO TIPO SERVICIOS
Route::resource('/cat_tiposervicios', 'TiposerviciosController');
Route::get('/cat_tiposervicios/{id}/confirmDelete', 'TiposerviciosController@confirmDelete');

//CATALOGO ESTADOCLIENTES
Route::resource('/cat_estadoclientes', 'EstadoclientesController');
Route::get('/cat_estadoclientes/{id}/confirmDelete', 'EstadoclientesController@confirmDelete');

//CATALOGO TIPODOMICILIIOS
Route::resource('/cat_tipodomicilios', 'TipodomicilioController');
Route::get('/cat_tipodomicilios/{id}/confirmDelete', 'TipodomicilioController@confirmDelete');

//CATALOGO DOMICILIIOS
Route::get('cat_domicilios/{id}/create', 'DomicilioController@create');
Route::post('domicilios/{id}','DomicilioController@store');
Route::get('cat_domicilios/{id}/edit', 'DomicilioController@edit');
Route::put('cat_domicilios/{id}', 'DomicilioController@update');

//CATALOGO TIPOEMPLEADOS
Route::resource('/cat_tipoempleados', 'TipoempleadoController');
Route::get('/cat_tipoempleados/{id}/confirmDelete', 'TipoempleadoController@confirmDelete');
Route::post('/tipoempleado/cliente', 'TipoempleadoController@select');

//CATALOGO ESTADOUSUARIOS
Route::resource('/cat_estadosusuario', 'EstadousuariosController');
Route::get('/cat_estadosusuario/{id}/confirmDelete', 'EstadousuariosController@confirmDelete');

//CATALOGO USUARIOS
Route::resource('/cat_usuarios', 'UsuarioController');
Route::get('/cat_usuarios/{id}/confirmDelete', 'UsuarioController@confirmDelete');
Route::get('/cat_usuarios/{id}/estatus', 'UsuarioController@estatus');
Route::put('/cat_usuarios/{id}/estatus', 'UsuarioController@update_estatus');

//CATALOGO ESTADOSTURNOS
Route::resource('/cat_estadosturnos', 'EstadosturnosController');
Route::get('/cat_estadosturnos/{id}/confirmDelete', 'EstadosturnosController@confirmDelete');

//CATALOGO TIPOTURNOS
Route::resource('/cat_tipoturnos', 'TipoturnoController');
Route::get('/cat_tipoturnos/{id}/confirmDelete', 'TipoturnoController@confirmDelete');

//CATALOGO TURNOS
Route::resource('/cat_turnos', 'TurnoController');
Route::get('/cat_turnos/{id}/confirmDelete', 'TurnoController@confirmDelete');
Route::get('/cat_turnos/{id}/estatus', 'TurnoController@estatus');
Route::put('/cat_turnos/{id}/estatus', 'TurnoController@update_estatus');

//CATALOGO ESTADOSRESPONSABLES DE VEHICULOS
Route::resource('/cat_estadosrespveh', 'EstadoresponsablevehiculoController');
Route::get('/cat_estadosrespveh/{id}/confirmDelete', 'EstadoresponsablevehiculoController@confirmDelete');

//CATALOGO RESPONSABLES DE VEHICULOS
Route::resource('/cat_respveh', 'ResponsablevehiculoController');
Route::get('/cat_respveh/{id}/confirmDelete', 'ResponsablevehiculoController@confirmDelete');
Route::post('/usuarios/cliente', 'ResponsablevehiculoController@usuarios');
Route::get('/cat_respveh/{id}/estatus', 'ResponsablevehiculoController@estatus');
Route::put('/cat_respveh/{id}/estatus', 'ResponsablevehiculoController@update_estatus');