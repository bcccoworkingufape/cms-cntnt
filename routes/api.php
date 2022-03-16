<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource("users",App\Http\Controllers\Api\UserApiController::class,['except'=>['create','store','edit']]);
Route::resource("eventos",App\Http\Controllers\Api\EventosApiController::class,['except'=>['create','edit']]);
Route::resource("noticias",App\Http\Controllers\Api\NoticiasApiController::class,['except'=>['create','edit']]);
