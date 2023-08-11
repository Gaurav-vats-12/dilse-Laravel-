<?php
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactUsController;
use Illuminate\Support\Facades\Route as RouteAlias;

//Contact Us
RouteAlias::post('/submit-contact-form', [ContactUsController::class, 'store'])->name('contact.submit');
RouteAlias::post('/contact-us', [ContactUsController::class, 'submitContactFormAjax'])->name('contact-us-form');
//Email Subcriptiopn
RouteAlias::post('/email-subscription', array(ContactUsController::class, 'emailSubscription'))->name('emailSubscription');


// Booking  a Reservation
RouteAlias::post('/submit-reservation-form', [BookingController::class, 'submitBookATable'])->name('booktable.submit');
// Add To Cart
RouteAlias::prefix('cart')->name('cart.')->group(callback: function (){
    RouteAlias::POST('/create', [CartController::class, 'addtocart'])->name('add');
    RouteAlias::POST('/update', [CartController::class, 'updatecart'])->name('update');
    RouteAlias::POST('/delete/{id}', [CartController::class, 'destroy'])->name('delete');

});


