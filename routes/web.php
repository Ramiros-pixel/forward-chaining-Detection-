<?php

use Illuminate\Support\Facades\Route;

// 1. Import Controller Anda di bagian atas
use App\Http\Controllers\ForwardChainingController;
Route::get('/', function () {
    return view('welcome');
});

// 2. Route untuk MENAMPILKAN halaman form diagnosa (GET)
Route::get('/diagnosa', [ForwardChainingController::class, 'index'])->name('diagnosa.index');

// 3. Route untuk MEMPROSES data diagnosa dari form (POST)
Route::post('/diagnosa/proses', [ForwardChainingController::class, 'process'])->name('diagnosa.process');