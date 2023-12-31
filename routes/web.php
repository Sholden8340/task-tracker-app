<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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

Route::get('/user', [UserController::class, 'index'])->name("login");
Route::get('/user', [UserController::class, 'index'])->name("logout");


Route::get('/task', [TaskController::class, 'index'])->name("task");
Route::post('/task', [TaskController::class, 'store']);

Route::get('/task/new', [TaskController::class, 'create'])->name("create");

Route::get('/tasks/complete', [TaskController::class, 'completedTasksIndex'])->name("tasks.complete");
Route::put('/task/{id}/complete', [TaskController::class, 'markAsComplete'])->name("task.complete");

Route::get('/tasks/incomplete', [TaskController::class, 'incompleteTasksIndex'])->name("tasks.incomplete");
Route::delete('/task/{id}/incomplete', [TaskController::class, 'markAsIncomplete'])->name("task.incomplete");

Route::get('/task/{id}', [TaskController::class, 'edit'])->name("task.edit");
Route::put('/task/{id}', [TaskController::class, 'update'])->name("task.edit");

Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name("task.delete");
