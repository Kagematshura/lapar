<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\SettingsController;

Route::get('/', function () {
    return view('welcome');
});
//login
Route::get('/login', [LoginController::class, 'login'])->name('login');
//mainPage
Route::get('/main_page', [MainPageController::class, 'index'])->name('main.main_page');
//profile
Route::get('/profile', [ProfileController::class, 'index'])->name('pp.profile');
//calculator
Route::get('/calculator', [CalculatorController::class, 'index'])->name('plan.calculator');
// Settings
Route::get('/settings', [SettingsController::class, 'index'])->name('settings.settings');
