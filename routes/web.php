<?php

// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController as BlogControllerAlias;
use App\Http\Controllers\BookingController as BookingControllerAlias;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController as CheckoutControllerAlias;
use App\Http\Controllers\ContactUsController as ContactUsControllerAlias;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController as MenuControllerAlias;
use App\Http\Controllers\PaymentStatusController;
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
Route::middleware(['optimizeImages','addExpires'])->group(function () {
// Home Page
Route::get('/', [HomeController::class, 'Homepage'])->name('home');
// Contact Us
Route::get('/contact-us', [ContactUsControllerAlias::class, 'index'])->name('contact');
// About Us
Route::get('/about-us', [HomeController::class, 'aboutus'])->name('aboutus');
// Gallery Page
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
// Discount and Coupons
Route::get('/discount-and-coupons', [HomeController::class, 'giftCard'])->name('discountandcoupons');
// Bolg Page
Route::get('/blog', [BlogControllerAlias::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [BlogControllerAlias::class, 'blogdetails'])->name('blogdetails');
// Menu Page
Route::get('/menu/{slug}', [MenuControllerAlias::class, 'menu'])->name('menu');

Route::get('/product/{slug}', [MenuControllerAlias::class, 'menudetails'])->name('menudetails');
// Booking  a Reservation
Route::get('/book-a-reservation', [BookingControllerAlias::class, 'bookATable'])->name('booktable');

Route::get('/send', [HomeController::class, 'sendEmail']);
// Add to Cart
Route::prefix('cart')->name('cart.')->group(callback: function(){
    Route::GET('/', [CartController::class, 'viewcart'])->name('view');
    Route::POST('/apply-coupon', [CartController::class, 'apply_coupon'])->name('vieapply_couponw');
     Route::POST('/update-details', [CartController::class, 'update_details'])->name('update_details');
});

Route::prefix('checkout')->name('checkout.')->group(callback: function(){
        Route::get('/', [CheckoutControllerAlias::class, 'index'])->name('view');
        Route::get('/user_address', [CheckoutControllerAlias::class, 'user_address'])->name('user_address');
        Route::post('/payment', [CheckoutControllerAlias::class, 'makePayment'])->name('payment');
});

// Thank You Pages DDependency
Route::prefix('thank-you')->name('thank-you.')->group(callback: function(){
    Route::get('/', [PaymentStatusController::class, 'OrderPaymentStatus'])->name('orderStatus');


});
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
    }else{
      abort(404, 'Not found');
    }
});
require __DIR__.'/postroutes.php';
