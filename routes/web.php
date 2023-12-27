<?php

use App\Http\Controllers\FeedbacksController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::get('/tasks', [TasksController::class, 'index'])->name('tasks');

Route::get('/tasks/new', [TasksController::class, 'new'])->name('tasks.new');
Route::get('/tasks/{id}/edit', [TasksController::class, 'edit'])->name('tasks.edit');

Route::post('/tasks', [TasksController::class, 'create']);
Route::put('/tasks', [TasksController::class, 'update']);
Route::delete('/tasks', [TasksController::class, 'destroy']);

Route::get('/', [LoginController::class, 'new'])->name('session');
Route::post('/signin', [LoginController::class, 'signin'])->name('login');
Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/feedbacks', [FeedbacksController::class, 'index'])->name('feedbacks');
Route::get('/feedbacks/new', [FeedbacksController::class, 'new'])->name('feedbacks.new');
Route::post('/feedbacks', [FeedbacksController::class, 'create'])->name('feedbacks');
