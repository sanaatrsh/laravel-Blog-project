<?php

use App\Http\Controllers\API\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        "prefix" => 'blog',
        "as" => 'blog.'
    ],
    function () {

        Route::GET("/", [BlogController::class, 'index']);

        // Route::GET("/create", [BlogController::class, 'create'])->name('create');
        Route::POST("/store", [BlogController::class, 'store'])->name('store');
        Route::GET("/{blog}", [BlogController::class, 'show']);
        // Route::GET("/{blog}/edit", [BlogController::class, 'edit'])->name('edit');
        Route::PUT("/{blog}", [BlogController::class, 'update'])->name('update');
        Route::DELETE("/{blog}", [BlogController::class, 'destroy'])->name('delete');;
    }
);

