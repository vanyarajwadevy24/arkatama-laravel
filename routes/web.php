<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


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




Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'store']);
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'authenticate']);
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout']);


Route::resource('/roles', \App\Http\Controllers\RoleController::class)->middleware('auth');

Route::resource('/sliders', \App\Http\Controllers\SliderController::class)->middleware('auth');

Route::resource('/users', \App\Http\Controllers\UserController::class)->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing', [\App\Http\Controllers\LandingController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');