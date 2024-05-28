<?php

use Illuminate\Support\Facades\Route;
use App\Layers\Presentation\Controllers\Todo\CreateCityController;
use App\Layers\Presentation\Controllers\Todo\DestroyCityController;

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

Route::post('/city', [CreateCityController::class, 'create'])->name('create.city');
Route::delete('/city/{id}', [DestroyCityController::class, 'destroy'])->name('destroy.city');
