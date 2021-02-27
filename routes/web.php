<?php

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

Route::get('/', [\App\Http\Controllers\BlogController::class,'index']);
Route::get('/getmore', [\App\Http\Controllers\BlogController::class,'getMore'])->name('getMore');
Route::get('/getall', [\App\Http\Controllers\BlogController::class,'getall'])->name('getAll');
