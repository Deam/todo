<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoryController;

Route::get('/', [TodoController::class, 'index']);
Route::get('create', [TodoController::class, 'create']);
Route::get('details/{todo}', [TodoController::class, 'details']);
Route::get('edit/{todo}', [TodoController::class, 'edit']);

Route::post('update/{todo}', [TodoController::class, 'update']);

Route::get('categories', [CategoryController::class, 'index']);
Route::get('category/edit/{category}', [CategoryController::class, 'edit']);