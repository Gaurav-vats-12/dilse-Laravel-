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
Route::get('/discount-and-coupons', [HomeController::class, 'giftCard'])->name('discountandcoupons');

Route::get('{slug}', function ($slug) {
    // Check if the $admin variable conflicts with any other route or page
    // If it does, handle the conflict appropriately (e.g., redirect to admin dashboard)
    if ($slug === 'admin') {
        return redirect()->route('admin.dashboard');
    }elseif($slug =='terms-and-conditions' || $slug =='dilse-foundation-and-donation' || $slug =='privacy-policy'){
        $pagdata= Page::where('page_slug',$slug)->first();
        return view('Pages.dynamic-page-genrate',compact('pagdata'));
    }

    // Handle other routes...
});
