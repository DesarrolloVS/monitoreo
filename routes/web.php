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

//CATALOGO GPS MARCA MODELO
Route::resource('/cat_gpsmarcamodelo', 'GpsmarcamodeloController');
Route::get('/cat_gpsmarcamodelo/{id}/confirmDelete', 'GpsmarcamodeloController@confirmDelete');

//CATALOGO ESTADOS GPS CLIENTES
Route::resource('/cat_estadogpscliente', 'EstadogpsclienteController');
Route::get('/cat_estadogpscliente/{id}/confirmDelete', 'EstadogpsclienteController@confirmDelete');

//CATALOGO GPS CLIENTES
Route::resource('/cat_gpscliente', 'GpsclienteController');
Route::post('/gps/form', 'GpsclienteController@form');
Route::get('/cat_gpscliente/{id}/confirmDelete', 'GpsclienteController@confirmDelete');
Route::get('/cat_gpscliente/{id}/estatus', 'GpsclienteController@estatus');
Route::put('/cat_gpscliente/{id}/estatus', 'GpsclienteController@update_estatus');

//CATALOGOS VEHICULOS
Route::get('/cat_vehiculo', function () {
    return view('vehiculos.main');
});

//CATALOGO ESTADOS VEHICULOS
Route::resource('/cat_estadosvehiculos', 'EstadovehiculoController');
Route::get('/cat_estadosvehiculos/{id}/confirmDelete', 'EstadovehiculoController@confirmDelete');

//CATALOGO MARCA
Route::resource('/cat_marca', 'MarcaController');
Route::get('/cat_marca/{id}/confirmDelete', 'MarcaController@confirmDelete');

//CATALOGO SUBMARCAS
Route::resource('/cat_submarca', 'SubmarcaController');
Route::get('/cat_submarca/{id}/confirmDelete', 'SubmarcaController@confirmDelete');

//CATALOGO MODELOS
Route::resource('/cat_modelos', 'ModeloController');
Route::get('/cat_modelos/{id}/confirmDelete', 'ModeloController@confirmDelete');

//CATALOGO PROCEDENCIA
Route::resource('/cat_procedencia', 'ProcedenciaController');
Route::get('/cat_procedencia/{id}/confirmDelete', 'ProcedenciaController@confirmDelete');

//CATALOGO TIPOVEHICULOS
Route::resource('/cat_tipovehiculos', 'TipovehiculosController');
Route::get('/cat_tipovehiculos/{id}/confirmDelete', 'TipovehiculosController@confirmDelete');

//CATALOGO TIPOUSO
Route::resource('/cat_tipouso', 'TipousoController');
Route::get('/cat_tipouso/{id}/confirmDelete', 'TipousoController@confirmDelete');

//CATALOGO TIPOCOMBUSTIBLE
Route::resource('/cat_tipocombustible', 'TipocombustibleController');
Route::get('/cat_tipocombustible/{id}/confirmDelete', 'TipocombustibleController@confirmDelete');

//CATALOGO TIPOTRANSMISION
Route::resource('/cat_tipotransmision', 'TipotransmisionController');
Route::get('/cat_tipotransmision/{id}/confirmDelete', 'TipotransmisionController@confirmDelete');

//CATALOGO CLASE VEHICULO
Route::resource('/cat_clasevehiculo', 'ClasevehiculoController');
Route::get('/cat_clasevehiculo/{id}/confirmDelete', 'ClasevehiculoController@confirmDelete');

//CATALOGO VEHICULO
Route::resource('/cat_vehiculos', 'VehiculoController');
Route::get('/cat_vehiculos/{id}/confirmDelete', 'VehiculoController@confirmDelete');
Route::post('/vehiculo/marca', 'VehiculoController@submarca');
Route::get('/cat_vehiculos/{id}/estatus', 'VehiculoController@estatus');
Route::put('/cat_vehiculos/{id}/estatus', 'VehiculoController@update_estatus');
Route::get('/cat_vehiculos/{id}/gps', 'VehiculoController@gps');
Route::post('vehiculo/gps','VehiculoController@showgpss');
Route::put('/cat_vehiculos/{id}/gps', 'VehiculoController@update_gps');
Route::get('/cat_vehiculos/{id}/nogps', 'VehiculoController@nogps');
Route::get('cat_vehiculos/{id}/historico','VehiculoController@historico');
Route::post('/vehiculos/cliente','VehiculoController@clientes');
Route::get('/cat_vehiculos/create/{id}', 'VehiculoController@create');
Route::get('/cat_vehiculos/{id}/resp', 'VehiculoController@responsable');
Route::put('/cat_vehiculos/{id}/resp', 'VehiculoController@storeresp');
Route::get('/cat_vehiculos/{id}/responsablesh', 'VehiculoController@responsablesh');
Route::get('/cat_vehiculos/{id}/responsablesactuales', 'VehiculoController@resact');
Route::get('/cat_vehiculos/{id}/deleteResponsable', 'VehiculoController@confirm');
Route::delete('/cat_vehiculos/deleteResponsable/{id}', 'VehiculoController@destroyResponsable');

//CATALOGOS CLIENTES
Route::get('/cat_cliente', function () {
    return view('cliente.main');
});

//CATALOGOS USUARIOS
Route::get('/cat_usuario', function () {
    return view('usuario.main');
});

//CATALOGOS RESPONSABLES
Route::get('/cat_responsables', function () {
    return view('catalogos.respveh.main');
});

//CATALOGOS GPS
Route::get('/cat_gps', function () {
    return view('catalogos.gpscliente.main');
});