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



Route::middleware(['auth'])->name("comment.")->namespace("App\Http\Controllers")->group(function () {
    Route::get("/comments","CommentController@index")->name("index")->withoutMiddleware('auth');

Route::get("/comments/{id}","CommentController@show")->name('show')->where('id','[0-9]+')->withoutMiddleware('auth');


    Route::patch("/comments/{id}","CommentController@update")->name('update')->withoutMiddleware('auth');


        Route::delete("/comments/{id}","CommentController@destroy")->name('destroy')->withoutMiddleware('auth');


        Route::post("/comments","CommentController@store")->name('store')->withoutMiddleware('auth');

});
