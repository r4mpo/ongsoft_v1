<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetsController;
use App\Http\Controllers\FinanceirosController;

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

/* Rotas da Aplicação - Fluxo Principal */
Route::get('/', [PetsController::class, 'index']);
Route::get('/pets/create', [PetsController::class, 'create'])->middleware('auth');
Route::get('/pets/show/{id}', [PetsController::class, 'show'])->middleware('auth');
Route::get('/pets/edit/{id}', [PetsController::class, 'edit'])->middleware('auth');
Route::post('/pets/store', [PetsController::class, 'store'])->middleware('auth');
Route::put('/pets/update/{id}', [PetsController::class, 'update'])->middleware('auth');
Route::delete('/pets/delete/{id}', [PetsController::class, 'destroy'])->middleware('auth');

/* Rotas para a administração financeira */
Route::get('financeiros/datatable', [FinanceirosController::class, 'dataTable'])->middleware('auth');
Route::get('financeiros/datatable/{id}', [FinanceirosController::class, 'dataTableID'])->middleware('auth');
Route::post('/financeiros/store', [FinanceirosController::class, 'store'])->middleware('auth');
Route::put('/financeiros/atualizarDados/{id}', [FinanceirosController::class, 'update'])->middleware('auth');
Route::delete('/financeiros/destroy/{id}', [FinanceirosController::class, 'destroy'])->middleware('auth');

/* Rotas do Middleware - Jetstream */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});