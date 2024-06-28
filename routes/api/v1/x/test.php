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



Route::get("/test2",function(){
    return "test 22";
});