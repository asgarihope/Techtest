<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FibonacciController;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'attemptLogin'])->name('attemptLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::prefix('panel')->name('panel.')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [PanelController::class, 'index'])->name('index');
        Route::resource('article', ArticleController::class);
    });

    Route::get('/fibonacci', [FibonacciController::class, 'index'])->name('fibonacci');
});
