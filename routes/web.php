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

//Raiz Noscript
Route::get('/', function () {
    return view('auth.noscript');
});

//Login
Route::get('/login', 'HomeController@login')->name('login');

//Vista Principal
Route::get('/home', 'HomeController@index')->name('home');

//Proteccion de Rutas
Auth::routes();

//Usuarios con permisologia "create,read,update"
Route::group(['middleware' => ['permission:create']], function () {
    //Registro de Pacientes
    Route::resource('paciente', 'PacienteController');

    //Controlador Dinamico entre Pacientes y Citas
    Route::get('edit_pac', 'SolicitudController@edit_pac')->name('edit_pac');
    Route::post('edit_pac_upd', 'SolicitudController@edit_pac_upd')->name('edit_pac_upd');
    Route::get('sol_pac','SolicitudController@sol_pac')->name('sol_pac');
    Route::post('sel_ref','SolicitudController@sel_ref')->name('sel_ref');

    //Obtener Registros de Estudios, Sub Estudios y Precios
    Route::get('getestudios','SolicitudController@getEstudios')->name('getestudios');
    Route::get('getsubestudios','SolicitudController@getSubEstudios')->name('getsubestudios');
    Route::get('getprecio','SolicitudController@getPrecio')->name('getprecio');
    Route::get('getreferencia','SolicitudController@getreferencia')->name('getreferencia');
    Route::get('getfiltrar','SolicitudController@getfiltrar')->name('getfiltrar');

    //Registro de Citas
    Route::resource('citas','CitaController');
    Route::post('cita','CitaController@addcita')->name('cita');
    Route::get('/check/{id}','CitaController@check')->name('check');

    //Registro de Referencias
    Route::resource('referencias','ReferenciaController');

    //Registro de Consultorios
    Route::resource('consultorio','ConsultorioController');

    //Registro de Estudios
    Route::resource('estudio','EstudioController');

    //Consultas de Consultorios, Referencias, Estudios y Bitacora
    Route::match(array('GET','POST'),'search.consultorio', 'SearchController@search_consultorio')->name('search.consultorio');
    Route::match(array('GET','POST'),'search.referencia', 'SearchController@search_referencia')->name('search.referencia');
    Route::match(array('GET','POST'),'search.estudio', 'SearchController@search_estudio')->name('search.estudio');
    Route::match(array('GET','POST'),'search.bitacora', 'SearchController@search_bitacora')->name('search.bitacora');

    //Historial
    Route::get('sol_hist', 'SolicitudController@sol_hist')->name('sol_hist');
    Route::get('historial', 'SolicitudController@historial')->name('historial');

    //Control citas
    Route::resource('controlcita','ControlCitasController');
    Route::get('verify_cita', 'ControlCitasController@verify_cita')->name('verify_cita');

    //Reportes
    Route::get('/imprimir', 'ReporteController@imprimir')->name('imprimir');
    Route::get('/imprimir.bitacora/{fecha}', 'ReporteController@imprimir_bitacora')->name('imprimir.bitacora');

    //Logout
    Route::match(array('GET','POST'),'logout', 'Auth\LoginController@logout')->name('logout');
});

//Usuarios con todos los permisos
Route::group(['middleware' => ['permission:create user']], function () {

    //RegistrO de Usuarios
    Route::resource('usuario','UsersController');

    //Consultar Usuarios
    Route::match(array('GET','POST'),'search.user', 'SearchController@search_user')->name('search.user');

    //Registrar SubEstudios
    Route::resource('subestudios','SubEstudioController');

    //Consultar SubEstudios
    Route::match(array('GET','POST'),'search.complemento', 'SearchController@search_complemento')->name('search.complemento');

    //Realizar Respaldo
    Route::get('backup', 'DatabaseController@backup')->name('backup');

    //Consultar Bitacora
    Route::resource('bitacora','BitacoraController');
});
