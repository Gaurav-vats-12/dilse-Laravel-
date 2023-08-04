<?php

// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\{HomeController, ContectController};
use Illuminate\Support\Facades\Route;
use App\Models\Admin\Page;
use Illuminate\Support\Facades\URL;

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
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
Route::post('/submit-contact-form', [HomeController::class, 'submitContactForm'])->name('contact.submit');
Route::post('/contact-us', [HomeController::class, 'submitContactFormAjax'])->name('contact-us-form');
Route::post('/email-subscription', [HomeController::class, 'emailSubscription'])->name('emailSubscription');
Route::get('/about-us', [HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/gift-card', [HomeController::class, 'giftCard'])->name('gift-card');
Route::any('/{slug}', function ($slug) {
    if($slug =='term-and-condition' || $slug =='dilse-foundation-and-donation' || $slug =='privacy-and-policy'){
        $pagdata= Page::where('page_slug',$slug)->first();
        return view('Pages.dynamic-page-genrate',compact('pagdata'));
    }

    // Handle other routes...
});
