<?php

use App\Modules\Users\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'user.auth', 'user.verified'])->get('/user', function () {
    return view('user.dashboard');
})->name('user.dashboard');

Route::group(['as' => 'user.', 'prefix' => '/user', 'middleware' => ['web', 'user.auth']], function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
