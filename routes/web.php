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
    return view('welcome');
});

Route::get('/map', function () {
    return view('map.main');
});

/*
Route::get('/mapago', function () {
    return view('mapago.mapa');
});
*/

Route::get('/mapaadmin', 'MondadminController@mapa');
Route::get('/listalertas', 'MondadminController@listalertas');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admón. GPS Marca - Modelo
Route::resource('/cat_gpsmarcamodelo', 'GpsmarcamodeloController');
Route::get('/cat_gpsmarcamodelo/{id1}/trazasgpsmm', 'GpsmarcamodeloController@trazasgpsmm');
Route::get('/cat_gpsmarcamodelo/{id1}/alertasgpsmm', 'GpsmarcamodeloController@alertasgpsmm');
Route::get('/cat_gpsmarcamodelo/{id1}/estatus', 'GpsmarcamodeloController@estatus');
Route::put('/cat_gpsmarcamodelo/{id1}/estatusupd', 'GpsmarcamodeloController@estatusupd');

//Trazas posiciones trazas gpsmm
Route::get('/cat_trazas/{id1}/posiciones', 'TrazaController@positions');

//Trazas crear alertas gpsmm
Route::resource('/cat_gpsalerta', 'GpsalertaController');
Route::get('/cat_gpsalerta/{id1}/create', 'GpsalertaController@create');
Route::put('/cat_gpsalerta/{id1}/update', 'GpsalertaController@update');
Route::get('/cat_gpsalerta/{id1}/estatus', 'GpsalertaController@estatus');
Route::put('/cat_gpsalerta/{id1}/update_estatus', 'GpsalertaController@update_estatus');


//Admón. Clientes
Route::resource('/cat_clientes', 'ClienteController');
Route::get('/cat_clientes/{id1}/parametroscte', 'ClienteController@parametroscte');
Route::get('/cat_clientes/{id1}/gpsscte', 'ClienteController@gpsscte');
Route::get('/cat_clientes/{id1}/vehiculoscte', 'ClienteController@vehiculoscte');
Route::get('/cat_clientes/{id1}/domicilios', 'ClienteController@domicilios');
Route::get('/cat_clientes/{id1}/usuarioscte', 'ClienteController@usuarioscte');
Route::get('/cat_clientes/{id1}/gpsmmcte', 'ClienteController@gpsmmcte');
Route::get('/cat_clientes/{id1}/estatus', 'ClienteController@estatus');
Route::put('/cat_clientes/{id1}/estatus', 'ClienteController@update_estatus');


//Admón. Gps_s Clientes
Route::resource('/cat_gpscliente', 'GpsclienteController');
Route::get('/cat_gpscliente/create/{id1}', 'GpsclienteController@create');
Route::get('/cat_gpscliente/{id1}/estatus/{id2}/cliente', 'GpsclienteController@estatus');
Route::put('/cat_gpscliente/{id1}/estatus/', 'GpsclienteController@update_estatus');
Route::get('/cat_gpscliente/{id1}/edit/{id2}/cliente', 'GpsclienteController@edit');

//Admón. Domicilios Clientes
Route::resource('/cat_domicilios', 'DomicilioController');
Route::get('/cat_domicilios/{id1}/create', 'DomicilioController@create');
Route::post('/cat_domicilios/{id1}', 'DomicilioController@store');

//Admón. Usuarios Clientes
Route::resource('/cat_usuarioscte', 'UsuariocteController');
Route::get('/cat_usuarioscte/{id1}/create', 'UsuariocteController@create');
Route::get('/cat_usuarioscte/{id1}/estatus/{id2}/cliente/', 'UsuariocteController@estatus');
Route::put('/cat_usuarioscte/{id1}/estatus/{id2}/cliente/', 'UsuariocteController@update_estatus');
Route::get('/cat_usuarioscte/{id1}/roles/{id2}/cliente/', 'UsuariocteController@roles');
Route::put('/cat_usuarioscte/{id1}/roles/{id2}/cliente/', 'UsuariocteController@update_roles');
Route::get('/cat_usuarioscte/{id1}/edit/{id2}/cliente/', 'UsuariocteController@edit');
Route::put('/cat_usuarioscte/{id1}/edit/{id2}/cliente/', 'UsuariocteController@update');

//Admón. gps mm Clientes
Route::resource('/cat_gpsmmcte', 'GpsmmcteController');
Route::get('/cat_gpsmmcte/{id1}/create', 'GpsmmcteController@create');
Route::get('/cat_gpsmmcte/{id1}/alertascte', 'GpsmmcteController@alertascte');
Route::get('/cat_gpsmmcte/{id1}/alertasctecreate', 'GpsmmcteController@alertasctecreate');
Route::get('/cat_gpsmmcte/{id1}/alertascteedit', 'GpsmmcteController@alertascteedit');
Route::put('/cat_gpsmmcte/{id1}/alertascteupd', 'GpsmmcteController@alertascteupd');
Route::get('/cat_gpsmmcte/{id1}/estatus', 'GpsmmcteController@estatus');
Route::put('/cat_gpsmmcte/{id1}/estatusupd', 'GpsmmcteController@estatusupd');

//Admón. Parámetros generales
Route::resource('/cat_parametros', 'ParametrosController');
Route::get('/cat_parametros/create/{id1}', 'ParametrosController@create');
Route::post('/cat_parametros/store', 'ParametrosController@store');
Route::get('/cat_parametros/{id1}/estatus', 'ParametrosController@estatus');
Route::put('/cat_parametros/{id1}/estatusupd', 'ParametrosController@estatusupd');

//Admón. Usuarios propios
Route::resource('/cat_usuarios', 'UsuarioController');
Route::get('/cat_usuarios/{id1}/estatus', 'UsuarioController@estatus');
Route::put('/cat_usuarios/{id1}/estatus', 'UsuarioController@update_estatus');
Route::get('/cat_usuarios/{id1}/roles', 'UsuarioController@roles');
Route::put('/cat_usuarios/{id1}/rolesupd', 'UsuarioController@rolesupd');
Route::get('/cat_usuarios/{id1}/edit', 'UsuarioController@edit');
Route::put('/cat_usuarios/{id1}/update', 'UsuarioController@update');

//Catálogos
//Campos GPS
Route::resource('/cat_camposgps', 'CamposgpsController');

//Tipo traza
Route::resource('/cat_tipotraza', 'TipotrazaController');

//Estado traza
Route::resource('/cat_estadotrazas', 'EstadotrazaController');

//Estado gpscliente
Route::resource('/cat_estadogpscliente', 'EstadogpsclienteController');

//Estado vehiculos
Route::resource('/cat_estadosvehiculos', 'EstadovehiculoController');

//Estado vehiculos
Route::resource('/cat_tipovehiculos', 'TipovehiculosController');

//Estado usuario
Route::resource('/cat_estadosusuario', 'EstadousuariosController');

//Estado tipo persona
Route::resource('/cat_tipopersonas', 'TipopersonasController');

//Estado tipo empresas
Route::resource('/cat_tipoempresas', 'TipoempresasController');

//Estado tipo servicios
Route::resource('/cat_tiposervicios', 'TiposerviciosController');

//Estado estado clientes
Route::resource('/cat_estadoclientes', 'EstadoclientesController');

//Tipodomicilios
Route::resource('/cat_tipodomicilios', 'TipodomicilioController');

//Parametros cliente
Route::resource('/cat_parametroscte', 'ParametroscteController');
Route::get('/cat_parametroscte/{id1}/create', 'ParametroscteController@create');
Route::get('/cat_parametroscte/{id1}/edit', 'ParametroscteController@edit');

//Vehículos cliente
Route::resource('/cat_vehiculos', 'VehiculoController');
Route::get('/cat_vehiculos/create/{id1}', 'VehiculoController@create');
Route::get('/cat_vehiculos/{id1}/estatus/{id2}/cliente', 'VehiculoController@estatus');
Route::put('/cat_vehiculos/{id1}/estatus', 'VehiculoController@update_estatus');
Route::get('/cat_vehiculos/{id1}/gps/{id2}/cliente', 'VehiculoController@gps');
Route::put('/cat_vehiculos/{id1}/gps/{id2}/cliente', 'VehiculoController@update_gps');
Route::get('/cat_vehiculos/{id1}/nogps', 'VehiculoController@nogps');
Route::get('/cat_vehiculos/{id1}/gps/{id2}/cliente', 'VehiculoController@gps');
Route::get('/cat_vehiculos/{id1}/historico', 'VehiculoController@historico');
Route::get('/cat_vehiculos/{id1}/edit/{id2}/cliente', 'VehiculoController@edit');
