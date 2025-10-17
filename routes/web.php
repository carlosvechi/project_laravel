<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{BoardController, CardController, CommentController, UserController, TaskController, StepController, AttachController};
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

    
    Route::resource('boards', BoardController::class);
    Route::resource('cards', CardController::class);
    Route::resource('users', UserController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('steps', StepController::class);
    Route::resource('attacches', AttachController::class);
   
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
