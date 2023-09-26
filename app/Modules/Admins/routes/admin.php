<?php
use App\Http\Controllers\Admin\AdminController as AdminControllerAlias;
use App\Http\Controllers\Admin\BannerController as BannerControllerAlias;
use App\Http\Controllers\Admin\BlogController as BlogControllerAlias;
use App\Http\Controllers\Admin\CustomerController as CustomerControllerAlias;
use App\Http\Controllers\Admin\EmailSubscriberController;
use App\Http\Controllers\Admin\GalleryController as GalleryControllerAlias;
use App\Http\Controllers\Admin\MenuController as MenuControllerAlias;
use App\Http\Controllers\Admin\OrderManagemnetController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\PageManagementController as PageManagementControllerAlias;
use App\Http\Controllers\Admin\SettingController as SettingControllerAlias;
use App\Http\Controllers\Admin\TestimonialsController as TestimonialsControllerAlias;
use App\Modules\Admins\Http\Controllers\ProfileController as ProfileControllerAlias;
use App\Http\Controllers\BookingController as BookingControllerAlias;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FoodItemController as FoodItemControllerAlias;
use App\Http\Controllers\Admin\ExtraFoodItemController as ExtraFoodItemControllerAlias;

Route::prefix('admin')->name('admin.')->group(callback: function(){
    Route::middleware(['web', 'admin.auth', 'admin.verified','addExpires'])->group(callback: function(){
        Route::get('/dashboard', [AdminControllerAlias::class, 'dashboard'])->name('dashboard');
        Route::resource('banner', BannerControllerAlias::class);
        // Route::get('/banner/changeStatus/{id}', [BannerController::class, 'updateStatus'])->name('banner.changeStatus');

        Route::middleware('optimizeImages')->group(function () {
            Route::prefix('setting')->name('setting.')->group(callback: function(){
                Route::get('/genral', [SettingControllerAlias::class, 'genralsetting'])->name('genral');
                Route::put('/genral/{id}', [SettingControllerAlias::class, 'unregenerateSetting'])->name('genralstore');
                Route::get('/footer-setting', [SettingControllerAlias::class, 'footersetting'])->name('footersetting');
            });
        // food items
            Route::resource('food-items', FoodItemControllerAlias::class);
      // Blog
      Route::resource('blog', BlogControllerAlias::class);

        });


        Route::resource('manage-pages', PageManagementControllerAlias::class);
    // Manage Subscriber
        Route::prefix('manage-subscribers')->name('manage-subscribers.')->group(callback: function(){
            Route::get('/', [EmailSubscriberController::class, 'index'])->name('index');
            Route::get('unsubscribe/{id}', [EmailSubscriberController::class, 'unsubscribe_mail'])->name('view');
        });

        // Manage Attributes
        Route::resource('manage-attributes', AttributeController::class);



        Route::resource('extra-items', ExtraFoodItemControllerAlias::class);

        // testimonial
        Route::resource('testimonial', TestimonialsControllerAlias::class);

        // Menu's
        Route::resource('menu', MenuControllerAlias::class);


        // Gallery Image
        Route::resource('manage-gallery', GalleryControllerAlias::class);

        // Manage Booking Details
        Route::prefix('booking')->name('booking.')->group(callback: function(){
            Route::get('/', [BookingControllerAlias::class, 'fetchBooking'])->name('index');
            Route::get('/view/{id}', [BookingControllerAlias::class, 'show'])->name('show');
            Route::POST('/update-status', [BookingControllerAlias::class, 'updateStatus'])->name('updateStatus');
        });

        Route::prefix('order')->name('order.')->group(callback: function(){
            Route::get('/', [OrderManagemnetController::class, 'index'])->name('index');
            Route::get('/view/{id}', [OrderManagemnetController::class, 'viewOrder'])->name('show');
            Route::get('/download/{id}', [OrderManagemnetController::class, 'downloadOrderInPDF'])->name('download');
            Route::POST('/update-order', [OrderManagemnetController::class, 'orderStatus'])->name('orderStatus');
            Route::POST('/update-status', [OrderManagemnetController::class, 'ChangeOrderStatus'])->name('ChangeOrderStatus');

        });


//        Route::resource('order', OrderController::class);


        Route::prefix('manage-customer')->name('manage-customer.')->group(callback: function(){
            Route::get('/', [CustomerControllerAlias::class, 'index'])->name('index');
            Route::get('/view/{id}', [CustomerControllerAlias::class, 'show'])->name('view');
            Route::PUT('/control/{id}', [CustomerControllerAlias::class, 'control'])->name('control');

        });

    });
});
Route::group(['as' => 'admin.', 'prefix' => '/admin', 'middleware' => ['web', 'admin.auth']], function () {
    Route::get('/profile', [ProfileControllerAlias::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileControllerAlias::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileControllerAlias::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
