<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\Auth\UserAuth;

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



/* AUTH */
Route::post('/verify', [UserAuth::class, 'verify']);


/* USER */
Route::group(['middleware'=>['auth:api']], function(){
    Route::get('/user', [UserController::class, 'index']);
 });

Route::post('/user', [UserController::class , 'store']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::put('/user/{id}', [UserController::class, 'update']);


/* PRODUTO */
Route::post('/item', [ProdutoController::class , 'store']);

/* VENDAS */
Route::post('/vendas', [VendasController::class , 'store']);

