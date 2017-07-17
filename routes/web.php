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
Route::get('dashboard', 'DashboardController@index')->middleware('auth','status_user');

/* ---- Ruuta para llamar al inventario ----- */
Route::get('inventario', 'InventariosController@index')->middleware('auth','role.admin','status_user');

/* ---- Ruuta para llamar al inventario/datapicker ----- */
Route::post('busqueda', 'InventariosController@picker')->middleware('auth','role.admin','status_user');

// /* ---- Ruuta para buscar datos en la bitacora por fecha ----- */
// Route::post('busquedabitacora', 'InventariosController@busquedaBitacora');

/* ---- Ruuta para mostrar bienes ----- */
Route::get('busqueda_bienes/{id}', 'InventariosController@busquedaBienes')->middleware('auth','role.admin','status_user');

/*----- PDF individual-----*/
Route::get('pdf/{id}', 'PdfController@invoice')->middleware('auth','status_user');

/*----- PDF Reporte general -----*/
Route::get('pdf', 'PdfController@completo')->middleware('auth','status_user');

/*----- PDF reporte general por ajax -----*/
Route::post('pdf_general_download', 'PdfController@downloadGeneral')->middleware('auth','role.admin','status_user');

/*----- PDF mes actual -----*/
Route::get('pdf_mes_actual', 'PdfController@mesActual')->middleware('auth','role.admin','status_user');

/*----- PDF mes anterior -----*/
Route::get('pdf_mes_anterior', 'PdfController@mesAnterior')->middleware('auth','role.admin','status_user');

//busqueda ajax
Route::get('ubi/{id}','DepartamentosController@busquedaDep')->middleware('auth','role.user','status_user');

Route::get('subcat/{id}','CategoriasController@busquedaSubCat')->middleware('auth','role.user','status_user');

Route::get('tipo_subcat/{id}','TiposSubcatController@busquedaTipoSubCat')->middleware('auth','role.user','status_user');

Route::get('QR/{id}','QRController@mostrarQR')->middleware('auth','role.user','status_user');

Route::get('QR_Dowmload/{id}','QRController@descargarQR')->middleware('auth','role.user','status_user');

Route::post('prod_status/{id}', 'ProductosController@productoStatus')->middleware('auth','role.user','status_user');

Route::resource('productos','ProductosController',['middleware' => ['auth','role.user','status_user']]);

Route::resource('departamentos','DepartamentosController',['middleware' => ['auth','role.user','status_user']]);

Route::resource('ubi_exactas','UbicacionesExactasController',['middleware' => ['auth','role.user','status_user']]);

Route::resource('categorias','CategoriasController',['middleware' => ['auth','role.user','status_user']]);

Route::resource('sub_categorias','SubCategoriasController',['middleware' => ['auth','role.user','status_user']]);

Route::resource('tipos_subcat','TiposSubcatController',['middleware' => ['auth','role.user','status_user']]);

Route::resource('responsable','ResponsableController',['middleware' => ['auth','role.user','status_user']]);

Route::resource('users','UsersController',['middleware' => ['auth','role.admin','status_user']]);

Route::resource('bitacora','BitacoraController',['middleware' => ['auth','role.admin','status_user']]);

Route::resource('estadisticas','EstadisticasController',['middleware' => ['auth','role.admin','status_user']]);



