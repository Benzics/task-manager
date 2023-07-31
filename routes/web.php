<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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

Route::get('/', [ProjectController::class, 'index']);
Route::resource('projects', ProjectController::class)->only(['index','show', 'create', 'store']);
Route::resource('tasks', TaskController::class)->only(['store', 'update', 'destroy']);
Route::post('/tasks/reorder', [TaskController::class, 'reOrder'])->name('tasks.reorder');