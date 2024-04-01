<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('v1')->group(function () {

    //Login Administrador
    Route::post('/auth/login', [App\Http\Controllers\Api\V1\Auth\AuthController::class, 'login']);
    Route::group(['middleware'=>['auth:sanctum']], function () {
    //Contas
    Route::get('/conta', [App\Http\Controllers\Api\V1\ContaController::class, 'index']);
    Route::get('/conta/{id}', [App\Http\Controllers\Api\V1\ContaController::class, 'show']);
    Route::put('/conta/{id}', [App\Http\Controllers\Api\V1\ContaController::class, 'update']);
    Route::delete('/conta/{id}', [App\Http\Controllers\Api\V1\ContaController::class, 'destroy']);

    //Categorias
    Route::get('/categoria', [App\Http\Controllers\Api\V1\CategoriaController::class, 'index']);
    //SituacaoContas
    Route::get('/situacao', [App\Http\Controllers\Api\V1\SituacaoController::class, 'index']);
    });
});
