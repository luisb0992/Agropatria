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

Auth::routes();

/*----- login -----*/
Route::get('/','LoginController@index');

/* ---- Ruuta para llamar al dashboard, modificarla si es necesario ----- */
Route::get('dashboard', 'DashboardController@index');

/* ---- Ruuta para llamar al inventario ----- */
Route::get('inventario', 'InventariosController@index');

/* ---- Ruuta para llamar al inventario/datapicker ----- */
Route::post('busqueda', 'InventariosController@picker');

/* ---- Ruta para llamar al reporte/datapicker ----- */
Route::post('busquedareporte', 'InventariosController@pickerReporte');

/* ---- Ruta para llamar al inventario/datapicker ----- */
Route::get('inventario/reporteusers', 'InventariosController@reporteusers');

/*---- Ruta  Resource para los usuarios----*/
Route::resource('users','UsersController');

/*---- Ruta  Resource para los Productos----*/
Route::resource('productos','ProductosController');

/*---- Ruta  Resource para los Materiales----*/
Route::resource('materiales','MaterialesController');

/*---- Ruta  Resource para las ubicaciones----*/
Route::resource('ubicaciones','UbicacionesController');

/*---- Ruta  Resource para los tipos----*/
Route::resource('tipos','TiposController');

/*----- PDF individual-----*/
Route::get('pdf/{id}', 'PdfController@invoice');

/*----- PDF Reporte general -----*/
Route::get('pdf', 'PdfController@completo');