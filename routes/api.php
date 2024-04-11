<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiBookController;
use App\Http\Controllers\ApiAuthController;

//Books API


Route::middleware('isApiUser')->group(function () {
    Route::post('/books/store', [ApiBookController::class, 'store']);
    Route::post('/books/update/{id}', [ApiBookController::class, 'update']);
    Route::get('/books/delete/{id}', [ApiBookController::class, 'delete']);

    Route::get('/books', [ApiBookController::class, 'index']);
    Route::get('/books/show/{id}', [ApiBookController::class, 'show']);
});



//login, Register
Route::post('/handleLogin', [ApiAuthController::class, 'handleLogin']);
Route::post('/handleRegister', [ApiAuthController::class, 'handleRegister']);
Route::post('/logout', [ApiAuthController::class, 'logout']);
