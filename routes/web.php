<?php

use App\Http\Controllers\PasienController;
use App\Http\Controllers\RumahSakitController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('dashboard');
    } else {
        return redirect('login');
    }
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::prefix('dashboard')->group(function () {
    Route::prefix('rumahsakit')->group(function () {
        Route::get('/', [RumahSakitController::class, 'index'])->name('rumahsakit');
        Route::get('tambah', [RumahSakitController::class, 'add'])->name('rumahsakit.add');
        Route::post('store', [RumahSakitController::class, 'store'])->name('rumahsakit.store');
        Route::get('/{id}/ubah', [RumahSakitController::class, 'edit'])->name('rumahsakit.edit');
        Route::put('update/{id}', [RumahSakitController::class, 'update'])->name('rumahsakit.update');
        Route::delete('hapus/{id}', [RumahSakitController::class, 'destroy'])->name('rumahsakit.destroy');
    });
    Route::prefix('pasien')->group(function () {
        Route::get('/', [PasienController::class, 'index'])->name('pasien');
        Route::get('tambah', [PasienController::class, 'add'])->name('pasien.add');
        Route::post('store', [PasienController::class, 'store'])->name('pasien.store');
        Route::get('/{id}/ubah', [PasienController::class, 'edit'])->name('pasien.edit');
        Route::put('update/{id}', [PasienController::class, 'update'])->name('pasien.update');
        Route::delete('hapus/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');
        Route::get('filter', [PasienController::class, 'filterByRumahSakit'])->name('pasien.filterByRumahSakit');
    });
});
