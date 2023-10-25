<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('device')->name('device.')->group(function () {
    Route::post('/login', [\App\Http\Controllers\FenixController::class, 'login'])->name('login');
    Route::post('/subscribe', [\App\Http\Controllers\FenixController::class, 'subscribe'])->name('subscribe');
});

Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('devices', [\App\Http\Controllers\AdminController::class, 'getDevices']);
});
