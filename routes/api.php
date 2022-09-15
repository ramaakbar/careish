<?php

use App\Http\Controllers\api\Cities;
use App\Http\Controllers\api\Provinces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/provinces', Provinces::class)->name('provinces');

Route::get('/cities/{provinces_id?}', [Cities::class,'getCities'])->name('cities');
