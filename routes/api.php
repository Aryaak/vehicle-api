<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
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

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', [UserController::class, 'login']);
    });

    Route::prefix('vehicle')->middleware(['jwt.verify'])->group(function () {
        Route::get('get-stocks', [VehicleController::class, 'getStocks']);
        Route::post('sell', [VehicleController::class, 'sell']);
        Route::get('get-sale-reports', [VehicleController::class, 'getSellReports']);
    });
});
