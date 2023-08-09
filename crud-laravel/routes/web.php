<?php

use Illuminate\Support\Facades\Route;
//importamos el controlador
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//usamos el comando php artisan route:list para ver las rutas creadas
//usamos el comando php artisan serve para levantar el servidor y que nos de la ruta de nuestras pag agregamos /tasks para ver nuestra web
Route::resource('tasks', TaskController::class);