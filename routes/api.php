<?php

use App\Http\Controllers\BookController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/books', [BookController::class, 'index']);

Route::get('/books/{id}', [BookController::class, 'find']);

Route::post('/books', [BookController::class, 'store']);

Route::put('/books/{id}', [BookController::class, 'put']);

Route::delete('/books/{id}', [BookController::class, 'delete']);