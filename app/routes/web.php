<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\AddressController;
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

Route::name('member.')->group(function(){
    Route::get('','App\Http\Controllers\MemberController@index')->name('index');
    Route::get('/create','App\Http\Controllers\MemberController@create')->name('create');
    Route::post('/store','App\Http\Controllers\MemberController@store')->name('store');
    Route::get('/edit/{member}','App\Http\Controllers\MemberController@edit')->name('edit');
    Route::patch('/update/{member}','App\Http\Controllers\MemberController@update')->name('update');
});
