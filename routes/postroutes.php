<?php
use App\Http\Controllers\{HomeController,BlogController,MenuController,CartController,BookingController,ContactUsController};
use Illuminate\Support\Facades\Route;

// Contact Us
Route::post('/submit-contact-form', [ContactUsController::class, 'store'])->name('contact.submit');
Route::post('/contact-us', [ContactUsController::class, 'submitContactFormAjax'])->name('contact-us-form');
Route::post('/email-subscription', [ContactUsController::class, 'emailSubscription'])->name('emailSubscription');
// Booking  a Reservation
Route::post('/submit-reservation-form', [BookingController::class, 'submitBookATable'])->name('booktable.submit');


// Add To Cart
Route::prefix('cart')->name('cart.')->group(function(){
    Route::POST('/create', [CartController::class, 'addtocart'])->name('add');
});

?>
