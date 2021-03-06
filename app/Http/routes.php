<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function () {
    Route::auth();
    Route::get('/admin', 'HomeController@index');
 
});


//logeo
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

//Usuario
Route::resource('usuario', 'UsuarioControlador');

//Indicadores
Route::resource('indicadores','IndicadorControlador');
Route::resource('indicadoresInicio','IndicadorControladorInicio');
Route::resource('indicadoresAgua', 'IndicadorControladorAgua');
Route::resource('indicadoresAguaInicio', 'IndicadorControladorAguaInicio');
Route::resource('indicadoresAire', 'IndicadorControladorAire');
Route::resource('indicadoresAireInicio', 'IndicadorControladorAireInicio');


//Tareas
Route::resource('tareas','tareaControlador');
Route::resource('tareaInicio','TareaControladorInicio');
Route::resource('tareaAgua','tareaAguaControlador');
Route::resource('tareaAguaInicio','TareaAguaControladorInicio');
Route::resource('tareaAire','tareaAireControlador');
Route::resource('tareaAireInicio','TareaAireControladorInicio');
Route::resource('tareaEditar','tareaControladorEditar');
Route::resource('tareaAguaEditar','tareaAguaControladorEditar');
Route::resource('tareaAireEditar','tareaAireControladorEditar');

//Reportes
Route::resource('reporte','ReporteControlador');
Route::resource('reporteInicio','ReporteControladorInicio');
Route::resource('reporteAgua','ReporteAguaControlador');
Route::resource('reporteAire','ReporteAireControlador');
Route::resource('excel','PDFController');
Route::resource('excelAgua','PDFControllerAgua');
Route::resource('excelAire','PDFControllerAire');


//PDF
Route::resource('reporte_pdf', 'PDFdocumentoController');
Route::resource('reporte_pdf_', 'PDFdocumentoAguaController');
Route::resource('reporte_pdf_a', 'PDFdocumentoAireController');