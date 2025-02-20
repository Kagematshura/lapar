<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CaroImageController;
use App\Http\Controllers\ApiSearchController;

Route::get('/', function () {
    return view('welcome');
});

//login
Route::get('/login_page', [LoginController::class, 'view'])->name('login.page');
Route::post('/signup', [LoginController::class, 'signup'])->name('login.signup');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::delete('/admin/DataUser/{user}', [LoginController::class, 'destroy'])->name('login.destroy');

Route::get('/login_test', [LoginController::class, 'loginTest'])->name('login.test');

//Resep
Route::get('/recipe/create', [RecipeController::class, 'create'])->name('recipe.create');
Route::post('/recipe/store', [RecipeController::class, 'store'])->name('recipe.store');
// Route::get(uri: '/recipe', [RecipeController::class, 'index'])->name('recipe.main');
Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name('recipe.show');
Route::delete('/recipe/{recipe}', [RecipeController::class, 'destroy'])->name('recipe.destroy');
Route::post('/recipe/{post}/like', [RecipeController::class, 'like'])->name('recipe.like');
Route::get('/recipes/load-more-main', [MainPageController::class, 'loadMoreMain'])->name('recipe.loadMain');
Route::get('/recipes/load-more-rec', [MainPageController::class, 'loadMoreRec'])->name('recipe.loadRec');

//mainPage
Route::get('/main_page', [MainPageController::class, 'index'])->name('main.main_page');
Route::get('/main_page/recipePreview', [MainPageController::class, 'recipePreview'])->name('main.preview');

//profile
Route::get('/profile', [ProfileController::class, 'index'])->name('pp.profile');
Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

//calculator
Route::get('/bmi-calculator', [CalculatorController::class, 'showForm'])->name('bmi.calculator');
Route::get('/calculator', [CalculatorController::class, 'index'])->name('calculator.index');
Route::post('/calculator/calculate', [CalculatorController::class, 'calculate'])->name('calculate.bmi');
Route::post('/calculator/planquota', [CalculatorController::class, 'updatebmr'])->name('plan.bmr');
Route::get('/planning', [CalculatorController::class, 'indexPlanning'])->name('plan.planning');
Route::get('/calorie-data', [CalculatorController::class, 'getWeeklyData']);
Route::post('/planning/calorie/store', [CalculatorController::class, 'storePlanning'])->name('store.planning');
Route::post('/planning/bb/store', [CalculatorController::class, 'storeBB'])->name('store.bb');

//APISearch
Route::get('/search', [ApiSearchController::class, 'search'])->name('API.search');
// Settings
Route::get('/settings', [SettingsController::class, 'index'])->name('settings.settings');

//admin
Route::get('/admin/DataRecipe', [AdminController::class, 'AdminRecipe'])->name('admin.datarecipe');

Route::get('/admin/DataImage', [CaroImageController::class, 'showUploadForm'])->name('admin.dataimage');
Route::post('/upload-image', [CaroImageController::class, 'uploadCaroImage'])->name('upload.caroimage');
Route::delete('/delete-image/{id}', [CaroImageController::class, 'deleteCaroImage'])->name('delete.caroimage');

Route::get('/admin/DataUser', [AdminController::class, 'AdminUser'])->name('admin.datauser');
Route::get('/admin/Home', [AdminController::class, 'AdminHomePage'])->name('admin.home');
Route::get('/admin', [AdminController::class, 'AdminLogin'])->name('admin.adminlogin');
Route::post('/admin', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Search
// Route::get('/search', action: [ApiSearchController::class, 'index']);
Route::post('/search/food', [ApiSearchController::class, 'searchFood'])->name('food.search');
