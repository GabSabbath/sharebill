<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('UserHome');
})->middleware(['auth'])->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/log', [AuthController::class, 'login'])->name('login2');

require __DIR__.'/settings.php';
require __DIR__.'/userRoutes.php';
require __DIR__.'/authRoutes.php';
