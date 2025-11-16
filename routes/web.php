<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/portfolio', [PortfolioController::class, 'index']);
Route::get('/', function () {
    return view('welcome');
});
