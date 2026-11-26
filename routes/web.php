<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/app', function () {
    return view('layout.app');
});

Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/create', [TaskController::class, 'create']);
Route::post('/delete/{id}', [TaskController::class, 'destroy']);
Route::match(['get', 'post'], '/edit/{id}', [TaskController::class, 'edit']);
Route::post('/update', [TaskController::class, 'update']);

Route::get('/users', [UserController::class, 'index']);
Route::post('/users/create', [UserController::class, 'create']);
Route::post('/users/delete/{id}', [UserController::class, 'destroy']);
Route::match(['get', 'post'], '/users/edit/{id}', [UserController::class, 'edit']);
Route::post('/users/update', [UserController::class, 'update']);
