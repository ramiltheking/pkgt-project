<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::middleware(["auth"])->group(
    function(){
        //Requests
        Route::get('/', function () {
            return view("welcome");
        });
        Route::post("/students",[\App\Http\Controllers\StudentController::class,"store"]);
        Route::post("/group",[\App\Http\Controllers\GroupController::class,"store"]);
        Route::delete("/group/{id}",[\App\Http\Controllers\GroupController::class,"destroy"]);
        Route::prefix("students")->group(
            function(){
                Route::get("/list",[\App\Http\Controllers\StudentController::class,"index"]);
            }
        );
        Route::prefix("lessons")->group(
            function(){
                Route::get("/list",[\App\Http\Controllers\LessonController::class,"index"]);
                Route::get("/add",[\App\Http\Controllers\LessonController::class,"store"]);
                Route::delete("/delete/{id}",[\App\Http\Controllers\LessonController::class,"destroy"]);
            }
        );
        Route::prefix("/groups")->group(
            function(){
                Route::get("/list",[\App\Http\Controllers\GroupController::class,"index"]);
            }
        );
    }
);



