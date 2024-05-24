<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentoController;

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

Route::get('/buscador', function () {
    return view('layouts.buscador');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tabla', function () {
    return view('layouts.tabla');
});

Route::get('/forulario', function () {
    return view('layouts.formulario');
});


Route::resource('documento', DocumentoController::class);

// Define la ruta GET para mostrar el formulario de creación de documento
Route::get('/documento', [DocumentoController::class, 'create']);

// Define la ruta POST para almacenar un nuevo documento
Route::post('/documento', [DocumentoController::class, 'store']);

