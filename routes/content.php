<?php

use App\Http\Controllers\API\ContentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//region contact
Route::group(
    [
        "prefix" => 'contact'
    ],
    function () {
        Route::GET("/", [ContentController::class, 'index']);
        // Route::GET("/{contact}", [ContactController::class, 'show']);

        // Route::GET("/create", [ContactController::class, 'create']);
        Route::POST("/", [ContentController::class, 'store']);

        // Route::GET("/{contact}/edit", [ContactController::class, 'edit']);
        // Route::PUT("/{contact}", [ContactController::class, 'update']);
        // Route::DELETE("/{contact}", [ContactController::class, 'destroy']);
    }
);
