<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

// Route::get('/user', [UserController::class, 'index'])->name("user");

// Route::get('/task', [TaskController::class, 'index']);
// Route::post('/task', [TaskController::class, 'index']);

// Route::get('/task/{id}', [TaskController::class, 'index']);
// Route::delete('/task/{id}', [TaskController::class, 'index']);
// Route::put('/task/{id}', [TaskController::class, 'index']);
