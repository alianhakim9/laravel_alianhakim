<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RumahSakitController;
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

Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('web');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('web');

Route::get('/rumahsakit', [RumahSakitController::class, 'index']);
