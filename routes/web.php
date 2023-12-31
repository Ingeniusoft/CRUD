<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PDFController;

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

Route::get('/', function () { // En esta parte basicamente lo que significa el nombre de la carpeta
                             // donde se encuentra el archivo
                                
    return view('auth.login'); // Aqui lo que hace es mostrar el contenido de acuerdo a la solicitud.
});


Route::resource('Usuarios', UsuariosController::class)->middleware('auth'); //Forma de acceder a todas las rutas
Auth::routes(['register'=>false, 'reset'=>false]);
Route::get('/Usuarios/generar-pdf', [PDFController::class, 'generarPDF'])->name('usuarios.generar-pdf');

//Por ejemplo:

/*Route::get('/Usuarios', function () { 
    return view('Usuarios.index'); //View es el metodo que hace referencia a index...(vista) que se encuentra en la
                                    //carpeta de Usuarios en este caso.
});

Route::get('/Usuarios/creade', function () { 
    return view('Usuarios.creade'); //View es el metodo que hace referencia a index...(vista) que se encuentra en la
                                    //carpeta de Usuarios en este caso.
});*/

//*********************************************************************************************************** */

/* Significa que cuando yo escriba "/Usuarios" este va a ir automaticamente al controlador "UsuariosController"
y va a tomar el archivo "index"

Route::get('/Usuarios', [UsuariosController::class, 'index']);
Route::get('/Usuarios/creade',[UsuariosController::class, 'creade']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
