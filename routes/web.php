<?php

use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin');
});

Route::resource('setting', SettingController::class);
