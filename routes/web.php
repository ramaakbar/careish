<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\dashboard\DashboardNurseController;
use App\Http\Controllers\dashboard\DashboardTransactionController;
use App\Http\Controllers\Dashboard\DashboardUserController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\user\UserFavoritesController;
use App\Http\Controllers\user\UserProfileSettingController;
use App\Http\Controllers\user\UserReviewsController;
use App\Http\Controllers\user\UserTransactionsController;
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

Route::get('/nurses', function () {
    return view('browseNurses');
});

Route::controller(NurseController::class)->group(function () {
    Route::get('/nurses', 'viewNurse');
    Route::get('/nurses/detail/{id}', 'viewNurseDetail');
});

Route::controller(UserTransactionsController::class)->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/trans/{nurse:id}', 'doTrans');
        Route::get('/trans/confirmation/{transaction:id}', 'transConfirm');
        Route::post('/trans/{nurse:id}/confirmation', 'pay');
    });
});

// Login and Register route
// login
Route::controller(LoginController::class)->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'authenticate');
        Route::get('/login/google', 'google');
        Route::get('/login/google/redirect', 'googleRedirect');
    });
    Route::post('/logout', 'logout');
});

// register
Route::controller(RegisterController::class)->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/register', 'index');
        Route::post('/register', 'store');
    });
});

// profile route
// Route::group(['prefix' => 'user', 'middleware' => ['auth']]
Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    Route::get('/transaction-list', [UserTransactionsController::class, 'index']);

    Route::get('/profile-setting', [UserProfileSettingController::class, 'index']);
    Route::put('/profile-setting', [UserProfileSettingController::class, 'update']);

    Route::get('/favorites', [UserFavoritesController::class, 'index']);

    Route::get('/reviews', [UserReviewsController::class, 'index']);
    Route::delete('/reviews/{review:id}', [UserReviewsController::class, 'delete']);
});

// dashboard route
// Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']]
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::controller(DashboardUserController::class)->group(function () {
        Route::get('/users', 'users');
        Route::get('/users/{user:id}', 'detail');
        Route::put('/users/{user:id}', 'update');
        Route::delete('/users/{user:id}', 'delete');
    });

    Route::controller(DashboardTransactionController::class)->group(function () {
        Route::get('/transactions', 'transactions');
        Route::get('/transactions/{transaction:id}', 'detail');
        Route::put('/transactions/{transaction:id}', 'update');
        Route::delete('/transactions/{transaction:id}', 'delete');
    });

    Route::controller(DashboardNurseController::class)->group(function () {
        Route::get('/nurses', 'nurses');
        Route::get('/nurses/{nurse:id}', 'detail');
        Route::put('/nurses/{nurse:id}', 'update');
        Route::delete('/nurses/{nurse:id}', 'delete');
    });
});
