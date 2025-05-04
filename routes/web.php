<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiswaController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

//*Bagian User
Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/login', function () {
    return view('home.login');
})->name('login');

Route::get('/error', function (){
    return redirect()->route('pengumuman')->with('error', 'Anda belum memenuhi syarat')->withInput();
})->name('error');
Route::post('pengumuman', [PengumumanController::class, 'Periksa'])->name('pengumuman');
Route::get('pengumuman', function(){
    return redirect()->route('login')->with('error', 'Mohon masukkan NISN terlebih dahulu')->withInput();
});

//*Bagian Admin
Route::get('/admin/login', function (){
    return view('adminLogin');
})->name('adminLogin');

Route::middleware([IsAdmin::class])->group(function (){
    Route::get('/admin/dashboard', function () {
        return view('content.dashboard');
    })->name('dashboard');
    Route::resource('setting', SettingController::class);
    Route::resource('siswa', SiswaController::class);
    Route::post('login_admin', [AuthController::class, 'login_admin'])->name('loginAdmin');
    Route::post('logout', [AuthController::class, 'logout'])->name('logoutAdmin');
    Route::post('/siswa-import', [SiswaController::class, 'import'])->name('siswa.import');

    Route::get('siswa/{id}/edit', [SiswaController::class, 'edit'])->name('viewSiswa');
});




