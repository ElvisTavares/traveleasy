<?php

use App\Http\Controllers\Travel\GetTravelByIdController;
use App\Http\Controllers\Travel\GetTravelController;
use App\Http\Controllers\Travel\StoreTravelController;
use App\Http\Controllers\Travel\UpdateTravelController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/travel')->name('.travel')->group(function () {
    Route::post('/store', StoreTravelController::class)->name('.store');
    Route::get('/', GetTravelController::class)->name('.list');
    Route::get('/{id}', GetTravelByIdController::class)->name('.list.id');
    Route::post('/{id}', UpdateTravelController::class)->name('.edit');
});
