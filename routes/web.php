<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/main_page', [MainPageController::class, 'index'])->name('main_page');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
