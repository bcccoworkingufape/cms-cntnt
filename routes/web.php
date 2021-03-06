<?php
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;


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
    return view('welcome');
});

Auth::routes(['register' => true]);

Route::resource("users",App\Http\Controllers\UserController::class,['except'=>['create','store']]);
Route::resource("eventos",App\Http\Controllers\EventosController::class);
Route::resource("noticias",App\Http\Controllers\NoticiasController::class);
Route::resource("projetos",App\Http\Controllers\ProjetosController::class,['except'=>['create','store']]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
