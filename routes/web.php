<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;


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
                                
    return view('welcome'); // Aqui lo que hace es mostrar el contenido de acuerdo a la solicitud.
});


Route::resource('Usuarios', UsuariosController::class); //Forma de acceder a todas las rutas


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
Route::get('/Usuarios/creade',[UsuariosController::class, 'creade']);*/



