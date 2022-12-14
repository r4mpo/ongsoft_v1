<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiPetsController;

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

/* Rota para retornar dados com requisições API */
Route::resource('pets', ApiPetsController::class);

/* Rotas do Middleware - Jetstream */
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});