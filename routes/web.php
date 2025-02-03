<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\FormResepController;
use App\Http\Controllers\PlanningController;

Route::get('/', function () {
    return view('welcome');
});
//login
Route::get('/login', [LoginController::class, 'login'])->name('login');

//Resep
Route::get('/Form_resep', [FormResepController::class, 'FormResep'])->name('resep.form_resep');

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

//admin
Route::get('/admin/DataRecipe', [AdminController::class, 'AdminRecipe'])->name('admin.datarecipe');
Route::get('/admin/DataImage', [AdminController::class, 'AdminImage'])->name('admin.dataimage');
Route::get('/admin/DataUser', [AdminController::class, 'AdminUser'])->name('admin.datauser');