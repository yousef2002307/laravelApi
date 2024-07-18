<?php

use Illuminate\Support\Facades\Route;
use App\Services\PlayGround;
use App\Services\Geo\Geo;
use App\Services\Geo\GeoFacade;
use App\Models\User;
use App\Models\Post;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
 $arr = ['1','2'];
 dd(collect($arr)->toArray());
});



    Route::get('/playground', function () {
      $user=User::find(7);
      \Illuminate\Support\Facades\Mail::to($user)->send(new \App\Mail\WelcomeMail($user));


        return null;
    });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test33',function(){
  $post = Post::all(); // Assuming ID 1
  $data = $post->toArray()[0]; // This will include 'title_upper' and 'body_array'
return $data['body_array']->name;   
});
