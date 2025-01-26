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
Route::get('/main_page/recipePreview', [MainPageController::class, 'recipePreview'])->name('main.preview');

//profile
Route::get('/profile', [ProfileController::class, 'index'])->name('pp.profile');

//calculator
Route::get('/bmi-calculator', [CalculatorController::class, 'showForm'])->name('bmi.calculator');
Route::post('/bmi-calculator', [CalculatorController::class, 'calculate'])->name('calculate.bmi');

Route::get('/calculator', [CalculatorController::class, 'index'])->name('calculator.index');
Route::post('/calculator/calculate', [CalculatorController::class, 'calculate'])->name('calculate.bmi');
Route::get('/planning', [CalculatorController::class, 'makePlanning'])->name('plan.planning');

// Settings
Route::get('/settings', [SettingsController::class, 'index'])->name('settings.settings');
