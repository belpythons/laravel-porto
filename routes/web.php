<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

// Hapus route /portfolio lama dan ganti dengan struktur ini
Route::get('/', [PortfolioController::class, 'home'])->name('portfolio.home');
Route::get('/experience', [PortfolioController::class, 'experience'])->name('portfolio.experience');
Route::get('/projects', [PortfolioController::class, 'projects'])->name('portfolio.projects');
Route::get('/skills', [PortfolioController::class, 'skills'])->name('portfolio.skills');
Route::get('/contributions', [PortfolioController::class, 'contributions'])->name('portfolio.contributions');

// Anda bisa membiarkan route /welcome jika masih ingin mengakses halaman selamat datang Laravel
Route::get('/welcome', function () {
    return view('welcome');
});
