<?php

use App\Modules\Users\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ReferralController;
use Illuminate\Support\Facades\Route as RouteAlias;

RouteAlias::prefix('user')->name('user.')->group(callback: function(){
    RouteAlias::middleware(['web', 'user.auth', 'user.verified','addExpires'])->group(callback: function(){
        // User Dashboard
        RouteAlias::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('checkUser');
        // View and update Profile Routes
        RouteAlias::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        RouteAlias::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // View and update Profile Address  Routes
        RouteAlias::get('/profile-address', [UserController::class, 'user_address'])->name('profile.address');
        RouteAlias::patch('/profile-address', [UserController::class, 'update_address'])->name('profile.address.update');
        // Order Functionality
        RouteAlias::get('/order', [UserController::class, 'listingOrder'])->name('order');
        RouteAlias::PUT('/order-cancelled/{id}', [UserController::class, 'OrderCancelled'])->name('order-cancelled');
        RouteAlias::get('/order-reorder/{id}', [UserController::class, 'OrderReorder'])->name('OrderReorder');
        RouteAlias::get('/confirm-passwords', [ProfileController::class, 'confirmPass'])->name('confirm-passwords');
        // Referral Route
        RouteAlias::get('/referral', [ReferralController::class, 'index'])->name('referral')->middleware('checkUser');
    });
});

require __DIR__.'/auth.php';
