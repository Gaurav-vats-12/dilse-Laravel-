<?php

// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\{HomeController, ContectController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'Homepage'])->name('home');
Route::get('/home-2', [HomeController::class, 'Homepage2']);
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
Route::post('/submit-contact-form', [HomeController::class, 'submitContactForm'])->name('contact.submit');
Route::post('/contact-us', [HomeController::class, 'submitContactFormAjax'])->name('contact-us-form');
Route::post('/email-subscription', [HomeController::class, 'emailSubscription'])->name('emailSubscription');
Route::get('/about-us', [HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/gift-cart', [HomeController::class, 'giftcart'])->name('gift-cart'); 


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
