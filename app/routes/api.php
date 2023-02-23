<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\AddressController;
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


Route::get('member', [MemberController::class, 'index'])->name('member.index');
Route::get('member/{id}', [MemberController::class, 'show'])->name('member.show');
Route::post('member', [MemberController::class, 'store'])->name('member.store');
