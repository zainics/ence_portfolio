<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProjectController;

Route::get('/', [PortfolioController::class, 'index'])->name('home.index');



Route::post('/contact', [PortfolioController::class, 'contactSubmit'])->name('portfolio.contact');



Route::get('/gdrive-projects', [ProjectController::class, 'index'])->name('projects.gdrive');