<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/ticket/{license_plate}/open', [\App\Http\Controllers\TicketController::class, 'getParkingStatus'])->name('api.ticket.is.parking');
Route::delete('/delete/{license_plate}', [\App\Http\Controllers\TicketController::class, 'destroy'])->name('api.ticket.delete');
