<?php

use App\Http\Controllers\API\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        "prefix" => 'category'
    ],
    function () {
        Route::GET("/", [CategoryController::class, 'index']);
        // Route::GET("/{category}", [CategoryController::class, 'show']);

        // Route::GET("/create", [CategoryController::class, 'create']);
        // Route::POST("/", [CategoryController::class, 'store']);
        // Route::GET("/{category}/edit", [CategoryController::class, 'edit']);
        // Route::PUT("/{category}", [CategoryController::class, 'update']);
        // Route::DELETE("/{category}", [CategoryController::class, 'destroy']);
    }
);
