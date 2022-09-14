<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\dashboard\DashboardNurseController;
use App\Http\Controllers\dashboard\DashboardTransactionController;
use App\Http\Controllers\Dashboard\DashboardUserController;
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

// dashboard route
// Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']]
Route::group(['prefix' => 'dashboard'], function(){
    Route::get('/',[DashboardController::class,'index']);

    Route::controller(DashboardUserController::class)->group(function () {
        Route::get('/users','users');
        Route::get('/users/{user:id}','detail');
        Route::put('/users/{user:id}','update');
        Route::delete('/users/{user:id}','delete');
    });

    Route::controller(DashboardTransactionController::class)->group(function() {
        Route::get('/transactions','transactions');
        Route::get('/transactions/{transaction:id}','detail');
        Route::delete('/transactions/{transaction:id}','delete');
    });

    Route::controller(DashboardNurseController::class)->group(function() {
        Route::get('/nurses','nurses');
        Route::get('/nurses/{nurse:id}','detail');
        Route::delete('/nurses/{nurse:id}','delete');
    });
});