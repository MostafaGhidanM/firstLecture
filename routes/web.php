<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('isGuest')->group(function () {
    //Users
    //Register
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/handle-register', [AuthController::class, 'handleRegister'])->name('auth.handleRegister');
    //Login
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/handle-login', [AuthController::class, 'handleLogin'])->name('auth.handleLogin');
});
Route::middleware('isLoginAdmin')->group(function () {
    // Book Delete
    Route::get('/books/delete/{id}', [BookController::class, 'delete'])->name('books.delete');
    // categories Delete
    Route::get('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
});



Route::middleware('isLogin')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    //Book Create
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books/store', [BookController::class, 'store'])->name('books.store');
    // Book Update
    Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
    Route::post('/books/update/{id}', [BookController::class, 'update'])->name('books.update');

    //categories Create
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    // categories Update
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');

    //Notes
    Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
    Route::post('/notes/store', [NoteController::class, 'store'])->name('notes.store');
});

Route::get('/', function () {
    return view('welcome');
});
//Book Read
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/show/{id}', [BookController::class, 'show'])->name('books.show');

//categories
//categories Read
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/show/{id}', [CategoryController::class, 'show'])->name('categories.show');
