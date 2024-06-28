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



Route::middleware(['auth'])->name("post.")->namespace("App\Http\Controllers")->group(function () {
    Route::get("/posts","PostController@index")->name("index")->withoutMiddleware('auth');

Route::get("/posts/{id}","PostController@show")->name('show')->where('id','[0-9]+')->withoutMiddleware('auth');


    Route::patch("/posts/{id}","PostController@update")->name('update');


        Route::delete("/posts/{id}","PostController@destroy")->name('destroy');


        Route::post("/posts","PostController@store")->name('store')->withoutMiddleware('auth');

});
