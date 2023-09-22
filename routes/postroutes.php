<?php
use App\Http\Controllers\BookingController as BookingControllerAlias;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController as CheckoutControllerAlias;
use App\Http\Controllers\ContactUsController as ContactUsControllerAlias;
use App\Http\Controllers\MenuController as MenuControllerAlias;
use Illuminate\Support\Facades\Route as RouteAlias;

Route::middleware(['optimizeImages','addExpires'])->group(function () {
//Contact Us
RouteAlias::post('/contact-us', [ContactUsControllerAlias::class, 'submitContactFormAjax'])->name('contact-us-form');
//Email Subcriptiopn
RouteAlias::post('/email-subscription', array(ContactUsControllerAlias::class, 'emailSubscription'))->name('emailSubscription');
//Menu POST DATA
RouteAlias::POST('/post_menu_data', [MenuControllerAlias::class, 'post_menu_data'])->name('post_menu_data');


// Booking  a Reservation
RouteAlias::post('/submit-reservation-form', [BookingControllerAlias::class, 'submitBookATable'])->name('booktable.submit');
// Add To Cart
RouteAlias::prefix('cart')->name('cart.')->group(callback: function (){
    RouteAlias::POST('/create', [CartController::class, 'addtocart'])->name('add');
    RouteAlias::POST('/update', [CartController::class, 'updatecart'])->name('update');
    RouteAlias::POST('/delete/{id}', [CartController::class, 'destroy'])->name('destroy');
});

//Checkout
RouteAlias::prefix('checkout')->name('checkout.')->group(callback: function (){
    RouteAlias::POST('/create', [CheckoutControllerAlias::class, 'create'])->name('create');
});
});
