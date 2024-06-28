<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Support\Facades\App;
use App\Helper\Routes\RouteHelper;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    RouteHelper::getRoutes(__DIR__.'/api/v1/');
 });



// Route::prefix('v1')->group(function () {
//    require __DIR__.'/api/v1/user.php';
// });

// Route::prefix('v1')->group(function () {
//    require __DIR__.'/api/v1/post.php';
// });

// Route::prefix('v1')->group(function () {
//    require __DIR__.'/api/v1/comment.php';
// });
 Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
 });
