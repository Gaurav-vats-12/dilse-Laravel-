<?php

// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController as BlogControllerAlias;
use App\Http\Controllers\BookingController as BookingControllerAlias;
use App\Http\Controllers\CartController as CartControllerAlias;
use App\Http\Controllers\CheckoutController as CheckoutControllerAlias;
use App\Http\Controllers\ContactUsController as ContactUsControllerAlias;
use App\Http\Controllers\HomeController as HomeControllerAlias;
use App\Http\Controllers\MenuController as MenuControllerAlias;
use Illuminate\Support\Facades\Route as RouteAlias;
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
RouteAlias::get('/', [HomeControllerAlias::class, 'Homepage'])->name('home');
// Contact Us
RouteAlias::get('/contact-us', [ContactUsControllerAlias::class, 'index'])->name('contact');
// About Us
RouteAlias::get('/about-us', [HomeControllerAlias::class, 'aboutus'])->name('aboutus');
// Gallery Page
RouteAlias::get('/gallery', [HomeControllerAlias::class, 'gallery'])->name('gallery');
// Discount and Coupans
RouteAlias::get('/discount-and-coupons', [HomeControllerAlias::class, 'giftCard'])->name('discountandcoupons');
// Bolg Page
RouteAlias::get('/blog', [BlogControllerAlias::class, 'blog'])->name('blog');
RouteAlias::get('/blog/{slug}', [BlogControllerAlias::class, 'blogdetails'])->name('blogdetails');
// Menu Page
RouteAlias::get('/menu', [MenuControllerAlias::class, 'menu'])->name('menu');
RouteAlias::get('/menu/{slug}', [MenuControllerAlias::class, 'menudetails'])->name('menudetails');


// Booking  a Reservation
RouteAlias::get('/book-a-reservation', [BookingControllerAlias::class, 'bookATable'])->name('booktable');



// Add to Cart
RouteAlias::prefix('cart')->name('cart.')->group(function(){
    RouteAlias::get('/', [CartControllerAlias::class, 'viewcart'])->name('view');
    RouteAlias::get('/create/{id}', [CartControllerAlias::class, 'addtocart'])->name('add');
});

RouteAlias::prefix('checkout')->name('checkout.')->group(callback: function(){
    RouteAlias::get('/', [CheckoutControllerAlias::class, 'index'])->name('view');
//    dd('checkout');


});

//  Slug Dependency
RouteAlias::get('{slug}', function ($slug) {
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
