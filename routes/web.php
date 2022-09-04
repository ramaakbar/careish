<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
    return view('home');
});

// Login and Register route
// login
Route::get('/login',[LoginController::class,'index']);

// register
Route::get('/register',[RegisterController::class,'index']);


// dashboard
Route::get('/dashboard',[DashboardController::class,'index']);

Route::get('/dashboard/users',[DashboardController::class,'users']);