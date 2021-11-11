<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiTodoController;
use App\Http\Controllers\ApiCategoryController;

Route::prefix('todo')->group(function () {
    Route::get('/', [ApiTodoController::class, 'all']);
    Route::get('/{id}', [ApiTodoController::class, 'single']);
    
    Route::post('/', [ApiTodoController::class, 'store']);
    Route::patch('/{id}', [ApiTodoController::class, 'edit']);
    Route::delete('/{id}', [ApiTodoController::class, 'delete']);
    Route::post('finish', [ApiTodoController::class, 'finish']);
});

Route::prefix('category')->group(function () {
    Route::get('/', [ApiCategoryController::class, 'all']);
    Route::get('/{id}', [ApiCategoryController::class, 'single']);
    
    Route::post('/', [ApiCategoryController::class, 'store']);
    Route::patch('/{id}', [ApiCategoryController::class, 'edit']);
});
