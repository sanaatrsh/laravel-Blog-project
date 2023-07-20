<?php

use App\Http\Controllers\guest\BlogController;
use App\Http\Controllers\guest\CategoryController;
use App\Http\Controllers\guest\ContactController;
use App\Http\Controllers\guest\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);


//region category
Route::group(
    [
        "prefix" => 'category'
    ],
    function () {
        Route::GET("/", [CategoryController::class, 'index']);
        Route::GET("/{category}", [CategoryController::class, 'show']);

        Route::GET("/create", [CategoryController::class, 'create']);
        Route::POST("/", [CategoryController::class, 'store']);
        Route::GET("/{category}/edit", [CategoryController::class, 'edit']);
        Route::PUT("/{category}", [CategoryController::class, 'update']);
        Route::DELETE("/{category}", [CategoryController::class, 'destroy']);
    }
);
//endregion


//region blog
Route::group(
    [
        "prefix" => 'blog',
        "as" => 'blog.'
    ],
    function () {

        Route::GET("/", [BlogController::class, 'index']);

        Route::GET("/create", [BlogController::class, 'create'])->name('create');
        Route::POST("/store", [BlogController::class, 'store'])->name('store');
        Route::GET("/{blog}", [BlogController::class, 'show']);



        // Route::GET("test", function () {
        //     return view('guest.pages.show-blog');
        // });

        Route::GET("/{blog}/edit", [BlogController::class, 'edit'])->name('edit');
        Route::PUT("/{blog}", [BlogController::class, 'update'])->name('update');
        Route::DELETE("/{blog}", [BlogController::class, 'destroy'])->name('delete');;
    }
);
//endregion


//region contact
Route::group(
    [
        "prefix" => 'contact'
    ],
    function () {
        Route::GET("/", [ContactController::class, 'index']);
        // Route::GET("/{contact}", [ContactController::class, 'show']);

        // Route::GET("/create", [ContactController::class, 'create']);
        Route::POST("/", [ContactController::class, 'store']);

        // Route::GET("/{contact}/edit", [ContactController::class, 'edit']);
        // Route::PUT("/{contact}", [ContactController::class, 'update']);
        // Route::DELETE("/{contact}", [ContactController::class, 'destroy']);
    }
);
//endregion
