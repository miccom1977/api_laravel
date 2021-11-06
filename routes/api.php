<?php

use App\Services\BookingService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController, UserBookingController, AdminBookingController
};

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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/signInFirstTerm', [BookingService::class, 'signInFirstTerm']);
Route::post('/release', [BookingService::class, 'releaseTerm']);

Route::group(['middleware' => ['auth:sanctum'] ], function () {
    Route::resource('admin/booking', AdminBookingController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/admin/getAllReservedBookings', [BookingService::class, 'getAllReservedBookings']);
});
