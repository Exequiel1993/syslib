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

    return view('auth.login');

});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UserController');
    Route::get('profile', 'UserController@editProfile');
    Route::post('update-profile', 'UserController@updateProfile');
});

Route::resource('tipoArticulos', 'TipoArticuloController');

Route::resource('marcas', 'MarcaController');

Route::resource('articulos', 'ArticuloController');

Route::resource('proveedors', 'ProveedorController');

Route::resource('compras', 'CompraController');

Route::get('/pdf','PDFcontroller@pdf')->name('descargarPDF');

Route::get('/pdfarticulos','PDFcontroller@pdfArticulos')->name('descargarPDFarticulos');

Route::resource('detalles', 'DetalleController');

Route::resource('informes', 'InformeController');