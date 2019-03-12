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
//Route::get('/', [ 'as' => '/', 'uses' => 'Auth\LoginController@showLoginForm']);

Route::get('/','Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//Campamento
Route::group(['prefix'=>'campamento', 'middleware'=>['auth','campamento']], function(){

    Route::get('inicio','SolicitudController@inicio');
    
    //Route::get('inicio', function () { return view('recuperar');});

    Route::get('solicitud','SolicitudController@seleccionPartida');
    Route::get('lista_insumos','SolicitudController@getSolicitud')->name('datatable.insumos');

    Route::get('solicitud','SolicitudController@Monto');
    
    Route::post('enviarSolicitud','SolicitudController@enviarSolicitud');

    Route::get('listaPedido','SolicitudController@listaPedido');

    Route::get('desglocePedido/{id}','SolicitudController@desglocePedido');

    Route::get('pdf/{id}','SolicitudController@pdf')->name('desgloce.pdf');//pdf

});

//Administrador
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function(){

    Route::get('inicio','AdminController@Inicio');

    Route::resource('partida','PartidaController');
    Route::get('patida/lista', 'PartidaController@getPartida')->name('datatable.partida');

    Route::resource('producto','ProductoController');
    Route::get('Obtenerpartidas','ProductoController@ObtenerPartidas');

    Route::resource('users','UsersController');
    Route::get('Obtenerresidencias','UsersController@ObtenerResidencias');

    Route::get('reporte', 'AdminController@ReportePedidos');

    Route::get('desgloces/{id}','AdminController@DesglocePedido');

});

//Delegado administrativo
Route::group(['prefix'=>'delegado','middleware'=>['auth','delegado']], function(){ 

    Route::get('inicio', function () {
        return view('delegado.iniciodeleg');
    });

    Route::resource('partida','dPartidaController');
    Route::get('Obtenercapitulos','dPartidaController@ObtenerCapitulos');

    //Route::resource('capitulo','CapituloController');

    Route::resource('producto','dProductoController');
    Route::get('Obtenerpartidas','dProductoController@ObtenerPartidas');

    Route::resource('residencia','ResidenciaController');

    Route::get('reporte','DelegadoController@reporte');
    
    //Route::get('desgloce/{id}','DelegadoController@Desgloce');
    Route::get('desgloces/{id}','DelegadoController@Desgloce'); 

    Route::get('pdf/{id}','DelegadoController@pdf')->name('desgloce.pdf');//pdf   
    
    Route::get('asignar','DelegadoController@asignar');
    Route::get('desgloce/{id}','DelegadoController@DesgloceAsignar');
    Route::delete('asignar/{asignar}','DelegadoController@EliminarAsignacion');

    Route::post('asignarMonto','DelegadoController@NuevaAsignacion');

    Route::get('ObtenerListaPartidas','DelegadoController@ObtenerListaPartidas');

    Route::get('ObtenerResidencias','DelegadoController@ObtenerResidencias');

    Route::get('ObtenerPedidosporResidencia','DelegadoController@ObtenerPedidosporResidencia');//
   
    Route::get('ObtenerPedidosporFechas','DelegadoController@ObtenerPedidosporFechas');

    Route::get('ObtenerPedidosporEstado','DelegadoController@ObtenerPedidosporEstado');

    Route::put('desgloces/estados/{pedidoid}','DelegadoController@Estado');

    Route::get('consolidado','DelegadoController@DesgloceConsolidado');

    Route::get('ConsiladoPDF','DelegadoController@ConsolidadoPdf')->name('consolidado.pdf');//pdf

    Route::get('filtradopormesconsolidado','DelegadoController@filtradopormesconsolidado');

    Route::get('ExcelConsolidado/{mes}/{anio}','DelegadoController@Consolidado2');

});

//Auxiliar

Route::group(['prefix'=>'auxiliar','middleware'=>['auth','auxiliar']], function(){

    Route::get('inicio', function () {
        return view('auxiliar.inicio');
    });

    Route::resource('producto','aProductoController');
    Route::get('Obtenerpartidas','aProductoController@ObtenerPartidas');

    Route::resource('partida','aPartidaController');
    Route::get('Obtenercapitulos','aPartidaController@ObtenerCapitulos');
    //aResidenciaController
    Route::resource('residencia','aResidenciaController');

    Route::get('reporte','AuxiliarController@reporte');

    Route::get('desgloces/{id}','AuxiliarController@Desgloce');

    //Route::get('DesglocesPedido/{id}','AuxiliarController@DesglocePedido');

    Route::get('ObtenerPedidosporResidencia','AuxiliarController@ObtenerPedidosporResidencia');//
   
    Route::get('ObtenerPedidosporFechas','AuxiliarController@ObtenerPedidosporFechas');

    Route::get('ObtenerPedidosporEstado','AuxiliarController@ObtenerPedidosporEstado');

    Route::put('desgloces/estados/{pedidoid}','AuxiliarController@Estado');

}); 

