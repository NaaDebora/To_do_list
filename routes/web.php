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
    return view('welcome');
});

Route::middleware(['guest'])->group(function () {

    Route::prefix('/tasks')->group(function () {
Route::get('/', [\App\Http\Controllers\ToDoListController::class, 'index'])->name('index');
Route::post('/', [\App\Http\Controllers\ToDoListController::class, 'storeTask'])->name('storeTask');
Route::get('/get',[\App\Http\Controllers\ToDoListController::class, 'getTasks'])->name('getTasks');
Route::delete('/delete', [\App\Http\Controllers\ToDoListController::class, 'deleteTask'])->name('deleteTask');
Route::put('/edit', [\App\Http\Controllers\ToDoListController::class, 'editTask'])->name('editTask');
    });
});