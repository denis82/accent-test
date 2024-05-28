<?php

use Illuminate\Support\Facades\Route;
use App\Layers\Presentation\Controllers\Todo\Web\HomePageController;
use App\Layers\Presentation\Controllers\Todo\Web\AboutPageController;

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

Route::get('/', [HomePageController::class, 'get'])->name('get.home');
Route::get('/about', [AboutPageController::class, 'get'])->name('get.about');
