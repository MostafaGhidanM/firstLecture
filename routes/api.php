<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiBookController;

//Books API
Route::get('/books', [ApiBookController::class, 'index']);
Route::get('/books/show/{id}', [ApiBookController::class, 'show']);
Route::post('/books/store', [ApiBookController::class, 'store']);
Route::post('/books/update/{id}', [ApiBookController::class, 'update']);
Route::get('/books/delete/{id}', [ApiBookController::class, 'delete']);
