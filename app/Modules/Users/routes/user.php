<?php

use App\Modules\Users\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;

use Illuminate\Support\Facades\Route;

Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['web', 'user.auth', 'user.verified'])->group(function(){
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    });
});

require __DIR__.'/auth.php';
