<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{BoardController, CommentController, UserController, TaskController, StepController, AttachController};

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


    Route::resource('boards', BoardController::class);
    Route::resource('users', UserController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('steps', StepController::class);
    Route::resource('attacches', AttachController::class);
