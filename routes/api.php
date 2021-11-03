<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserBookingController;
use App\Http\Controllers\AdminBookingController;

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

Route::resource('booking', UserBookingController::class);

Route::group(['middleware' => ['auth:sanctum'] ], function () {
    Route::resource('admin/booking', AdminBookingController::class);
});
