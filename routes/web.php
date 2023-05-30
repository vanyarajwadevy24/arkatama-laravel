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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/landing', [\App\Http\Controllers\LandingController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::resource('/roles',\App\Http\Controllers\RoleController::class);
Route::resource('/users',\App\Http\Controllers\UserController::class);
Route::resource('/sliders',\App\Http\Controllers\SliderController::class);
Route::resource('/products',\App\Http\Controllers\ProductsController::class);