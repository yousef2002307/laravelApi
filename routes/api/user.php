<?php
use Illuminate\Support\Facades\Route;

Route::get("/users",[\App\Http\Controllers\UserController::class,"index"]);

Route::get("/users/{id}",[\App\Http\Controllers\UserController::class,"show"]);


    Route::patch("/users/{id}",[\App\Http\Controllers\UserController::class,"update"]);


        Route::delete("/users/{id}",[\App\Http\Controllers\UserController::class,"destroy"]);


        Route::post("/users",[\App\Http\Controllers\UserController::class,"store"]);
