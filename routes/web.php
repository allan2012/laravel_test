<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\ProjectsController;

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

Route::get('/', [TasksController::class, 'index'])->name('home');
Route::get('task/{task}', [TasksController::class, 'show']);
Route::get('tasks/create', [TasksController::class, 'create'])->name('tasks.create');
Route::post('tasks', [TasksController::class, 'store'])->name('tasks.store');
Route::get('tasks/edit/{task}', [TasksController::class, 'edit'])->name('tasks.edit');
Route::put('tasks/{task}', [TasksController::class, 'update'])->name('tasks.update');
Route::delete('tasks/{task}', [TasksController::class, 'destroy'])->name('tasks.delete');


Route::get('projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('project/create', [ProjectsController::class, 'create'])->name('projects.create');
Route::post('projects', [ProjectsController::class, 'store'])->name('projects.store');
Route::get('projects/edit/{project}', [ProjectsController::class, 'edit'])->name('projects.edit');
Route::put('projects/{project}', [ProjectsController::class, 'update'])->name('projects.update');
Route::delete('projects/{project}', [ProjectsController::class, 'destroy'])->name('projects.delete');

