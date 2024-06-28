<?php
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\Tester;
Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);
// Define other authentication routes as needed

Auth::routes();



Route::middleware(['auth'])->name("user.")->namespace("App\Http\Controllers")->group(function () {
    Route::get("/users","UserController@index")->name("index")->withoutMiddleware('auth');

Route::get("/users/{id}","UserController@show")->name('show')->where('id','[0-9]+');


    Route::patch("/users/{id}","UserController@update")->name('update');


        Route::delete("/users/{id}","UserController@destroy")->name('destroy');


        Route::post("/users","UserController@store")->name('store');

});
