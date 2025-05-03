<?php

use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/login', function () {
    return view('home.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('content.dashboard');
})->name('dashboard');

Route::resource('setting', SettingController::class);
Route::resource('siswa', SiswaController::class);
Route::post('/siswa-import', [SiswaController::class, 'import'])->name('siswa.import');

Route::post('pengumuman', [PengumumanController::class, 'Periksa'])->name('pengumuman');
