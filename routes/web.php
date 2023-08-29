<?php

use App\Http\Controllers\HeartRateController;
use App\Http\Controllers\RespirationRateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[RespirationRateController::class,'index'])->name('respiration_rate.index');
Route::get('/create',[RespirationRateController::class,'create'])->name('respiration_rate.create');
Route::post('/',[RespirationRateController::class,'store'])->name('respiration_rate.store');
Route::get('/heart_rate',[HeartRateController::class,'index'])->name('heart_rate.index');
Route::get('/heart_rate/create',[HeartRateController::class,'create'])->name('heart_rate.create');
Route::post('/heart_rate',[HeartRateController::class,'store'])->name('heart_rate.store');
