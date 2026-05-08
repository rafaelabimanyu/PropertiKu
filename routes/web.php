<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertyController;

use App\Http\Controllers\FeaturedController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/featured', [FeaturedController::class, 'index'])->name('featured');
Route::get('/guide', function () {
    return view('guide');
})->name('guide');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Role-specific Dashboards
    Route::get('/dashboard/buyer', [DashboardController::class, 'buyer'])->name('dashboard.buyer');
    Route::get('/dashboard/agent', [DashboardController::class, 'agent'])->name('dashboard.agent');
    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Property Management
    Route::resource('properties', PropertyController::class);
    
    // Buyer placeholder routes
    Route::get('/favorites', fn() => view('placeholders.favorites'))->name('favorites');
    Route::get('/bookings', fn() => view('placeholders.bookings'))->name('bookings');

    // Agent placeholder routes
    Route::get('/leads', fn() => view('placeholders.leads'))->name('leads');

    // Admin placeholder routes
    Route::get('/users', fn() => view('placeholders.users'))->name('users');
    Route::get('/reports', fn() => view('placeholders.reports'))->name('reports');
    Route::get('/settings', fn() => view('placeholders.settings'))->name('settings');
});

require __DIR__.'/auth.php';
