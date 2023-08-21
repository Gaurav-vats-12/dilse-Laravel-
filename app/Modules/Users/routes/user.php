<?php

use App\Modules\Users\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;

use Illuminate\Support\Facades\Route;

Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['web', 'user.auth', 'user.verified'])->group(function(){
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('checkUser');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/profile-address', [UserController::class, 'user_address'])->name('profile.address');
        Route::patch('/profile-address', [UserController::class, 'update_address'])->name('profile.address.update');
        Route::get('/order', [UserController::class, 'listingOrder'])->name('order');
    });
});

require __DIR__.'/auth.php';
