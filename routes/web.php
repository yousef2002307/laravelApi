<?php

use Illuminate\Support\Facades\Route;
use App\Services\PlayGround;
use App\Services\Geo\Geo;
use App\Services\Geo\GeoFacade;
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
  $in = GeoFacade::add("smagaassss");
echo $in;
});