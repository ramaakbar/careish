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
Route::get('/dashboard/users/{user:id}',[DashboardController::class,'userDetail']);
Route::put('/dashboard/users/{user:id}',[DashboardController::class,'update']);
Route::delete('/dashboard/users/{user:id}',[DashboardController::class,'delete']);

Route::get('/dashboard/transactions',[DashboardController::class,'transactions']);

Route::get('/dashboard/nurses',[DashboardController::class,'nurses']);

