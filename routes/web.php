<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForwardChainingController;
use Illuminate\Support\Facades\Route;

// Redirect root ke diagnosa jika login, jika tidak ke welcome page
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('diagnosa.index');
    }
    return view('welcome');
});

// Alias dashboard untuk redirect dari default Breeze login
Route::get('/dashboard', function () {
    return redirect()->route('diagnosa.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// ========== ROUTE DIAGNOSA ==========
Route::middleware('auth')->group(function () {
    // Form diagnosa
    Route::get('/diagnosa', [ForwardChainingController::class, 'index'])
         ->name('diagnosa.index');

    // Proses diagnosa
    Route::post('/diagnosa/proses', [ForwardChainingController::class, 'process'])
         ->name('diagnosa.process');

    // Riwayat diagnosa per user
    Route::get('/riwayat', [ForwardChainingController::class, 'riwayat'])
         ->name('riwayat.index');
});

// Profile Management (dari Laravel Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
