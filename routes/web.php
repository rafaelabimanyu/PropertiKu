<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\FeaturedController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/featured', [FeaturedController::class, 'index'])->name('featured');
Route::get('/guide', fn() => view('guide'))->name('guide');
Route::get('/sitemap', fn() => view('sitemap'))->name('sitemap');
Route::get('/contact', fn() => view('contact'))->name('contact');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Role-specific Dashboards
    Route::get('/dashboard/buyer', [DashboardController::class, 'buyer'])->name('dashboard.buyer');
    Route::get('/dashboard/agent', [DashboardController::class, 'agent'])->name('dashboard.agent');
    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');

    // Role-specific Guides
    Route::get('/dashboard/buyer/guide', [\App\Http\Controllers\GuideController::class, 'buyer'])->name('guide.buyer');
    Route::get('/dashboard/agent/guide', [\App\Http\Controllers\GuideController::class, 'agent'])->name('guide.agent');
    Route::get('/dashboard/admin/guide', [\App\Http\Controllers\GuideController::class, 'admin'])->name('guide.admin');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Property Management
    Route::resource('properties', PropertyController::class);

    // Bookings
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/buyer', [BookingController::class, 'buyerIndex'])->name('bookings.buyer');
    Route::get('/bookings/agent', [BookingController::class, 'agentIndex'])->name('bookings.agent');
    Route::get('/bookings/admin', [BookingController::class, 'adminIndex'])->name('bookings.admin');
    Route::patch('/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('bookings.updateStatus');

    // Favorites
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
    Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::delete('/favorites/{property}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

    // Chat
    Route::get('/chat', [ChatController::class, 'inbox'])->name('chat.inbox');
    Route::get('/chat/{user}', [ChatController::class, 'show'])->name('chat.show');
    Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::patch('/notifications/{notification}/read', [NotificationController::class, 'markRead'])->name('notifications.markRead');
    Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllRead'])->name('notifications.markAllRead');

    // Remaining placeholder routes
    Route::get('/bookings', fn() => redirect()->route(auth()->user()->isAdmin() ? 'bookings.admin' : (auth()->user()->isAgent() ? 'bookings.agent' : 'bookings.buyer')))->name('bookings');
    Route::get('/leads', [\App\Http\Controllers\LeadController::class, 'index'])->name('leads');
    Route::patch('/leads/{lead}/status', [\App\Http\Controllers\LeadController::class, 'updateStatus'])->name('leads.update');
    Route::get('/users', fn() => view('placeholders.users'))->name('users');
    Route::get('/reports', fn() => view('placeholders.reports'))->name('reports');
    Route::get('/settings', fn() => view('placeholders.settings'))->name('settings');

    // Verification System
    Route::get('/dashboard/agent/verification', [\App\Http\Controllers\VerificationController::class, 'index'])->name('verification.index');
    Route::post('/dashboard/agent/verification', [\App\Http\Controllers\VerificationController::class, 'submit'])->name('verification.submit');
    Route::get('/dashboard/admin/verifications', [\App\Http\Controllers\VerificationController::class, 'adminIndex'])->name('admin.verifications');
    Route::patch('/dashboard/admin/verifications/{user}/approve', [\App\Http\Controllers\VerificationController::class, 'approve'])->name('admin.verifications.approve');
    Route::patch('/dashboard/admin/verifications/{user}/reject', [\App\Http\Controllers\VerificationController::class, 'reject'])->name('admin.verifications.reject');

    // Review System
    Route::post('/properties/{property}/reviews', [\App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');

    // Premium System
    Route::patch('/properties/{property}/upgrade', [\App\Http\Controllers\PremiumController::class, 'upgrade'])->name('properties.upgrade');
});

require __DIR__.'/auth.php';
