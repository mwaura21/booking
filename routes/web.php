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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('available', App\Http\Controllers\AvailableController::class);
Route::get('viewAll/{date}/date', [App\Http\Controllers\DateController::class, 'viewAll'])->name('date.viewAll');
Route::delete('available', [App\Http\Controllers\AvailableController::class, 'deleteAll'])->name('available.deleteAll');

Route::resource('date', App\Http\Controllers\DateController::class);
Route::delete('date', [App\Http\Controllers\DateController::class, 'deleteAll'])->name('date.deleteAll');
