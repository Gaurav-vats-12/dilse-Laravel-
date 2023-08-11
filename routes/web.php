<?php

// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\{HomeController,BlogController,MenuController,CartController,BookingController,ContactUsController};
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
// Home Page
Route::get('/', [HomeController::class, 'Homepage'])->name('home');
// Contact Us
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact');
// About Us
Route::get('/about-us', [HomeController::class, 'aboutus'])->name('aboutus');
// Gallery Page
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
// Discount and Coupans
Route::get('/discount-and-coupons', [HomeController::class, 'giftCard'])->name('discountandcoupons');
// Bolg Page
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'blogdetails'])->name('blogdetails');
// Menu Page
Route::get('/menu', [MenuController::class, 'menu'])->name('menu');
Route::get('/menu/{slug}', [MenuController::class, 'menudetails'])->name('menudetails');


// Booking  a Reservation
Route::get('/book-a-reservation', [BookingController::class, 'bookATable'])->name('booktable');



// Add to Cart
Route::prefix('cart')->name('cart.')->group(function(){
    Route::get('/', [CartController::class, 'viewcart'])->name('view');
    Route::get('/create/{id}', [CartController::class, 'addtocart'])->name('add');


});


//

// Add to Cart
Route::prefix('cart')->name('cart.')->group(function(){
    Route::get('/', [CartController::class, 'viewcart'])->name('view');
    // Route::get('/create/{id}', [CartController::class, 'addtocart'])->name('add');
});
//  Slug Dependency
Route::get('{slug}', function ($slug) {
    if ($slug === 'admin') {
        return redirect()->route('admin.dashboard');
    }elseif ($slug === 'user') {
        return redirect()->route('user.dashboard');
    }elseif($slug =='terms-and-conditions' || $slug =='dilse-foundation-and-donation' || $slug =='privacy-policy'){
        $pagdata= Page::where('page_slug',$slug)->first();
        return view('Pages.dynamic-page-genrate',compact('pagdata'));
    }
});
require __DIR__.'/postroutes.php';
