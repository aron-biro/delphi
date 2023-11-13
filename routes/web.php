<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\GoogleController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Services;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/doctors', [DoctorsController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('doctors');

// Route::get('/general', function () {
//     return Inertia::render('General');
// })->middleware(['auth', 'verified'])->name('general');

// Route::get('/programations', function () {
//     return Inertia::render('Programations');
// })->middleware(['auth', 'verified'])->name('programations');

// Route::get('/patients', function () {
//     return Inertia::render('Patients');
// })->middleware(['auth', 'verified'])->name('patients');

// Route::get('/services', function () {
//     return Inertia::render('Services');
// })->middleware(['auth', 'verified'])->name('services');

// Route::get('/statistics', function () {
//     return Inertia::render('Statistics');
// })->middleware(['auth', 'verified'])->name('statistics');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('auth/google', [GoogleController::class, 'googlePage']);
Route::get('auth/google/callback', [GoogleController::class, 'googleCallback']);

require __DIR__ . '/auth.php';
