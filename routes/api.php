<?php

use App\Http\Controllers\CategoriaProdutoController;
use App\Http\Controllers\ProdutoController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/produtos/{id}', [ProdutoController::class, 'show'])->whereNumber('id');
Route::post('/produtos', [ProdutoController::class, 'store']);
Route::put('/produtos/{id}', [ProdutoController::class, 'update'])->whereNumber('id');
Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy'])->whereNumber('id');

Route::get('/categorias', [CategoriaProdutoController::class, 'index']);
Route::get('/categorias/{id}', [CategoriaProdutoController::class, 'show'])->whereNumber('id');
Route::post('/categorias', [CategoriaProdutoController::class, 'store']);
Route::put('/categorias/{id}', [CategoriaProdutoController::class, 'update'])->whereNumber('id');
Route::delete('/categorias/{id}', [CategoriaProdutoController::class, 'destroy'])->whereNumber('id');
