<?php
use App\Http\Controllers\Admin\AdminController as AdminControllerAlias;
use App\Http\Controllers\Admin\BannerController as BannerControllerAlias;
use App\Http\Controllers\Admin\BlogController as BlogControllerAlias;
use App\Http\Controllers\Admin\CustomerController as CustomerControllerAlias;
use App\Http\Controllers\Admin\GalleryController as GalleryControllerAlias;
use App\Http\Controllers\Admin\MenuController as MenuControllerAlias;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderManagemnetController as OrderManagemnetControllerAlias;
use App\Http\Controllers\Admin\PageManagementController as PageManagementControllerAlias;
use App\Http\Controllers\Admin\SettingController as SettingControllerAlias;
use App\Http\Controllers\Admin\TestimonialsController as TestimonialsControllerAlias;
use App\Modules\Admins\Http\Controllers\ProfileController as ProfileControllerAlias;
use App\Http\Controllers\BookingController as BookingControllerAlias;
use Illuminate\Support\Facades\Route as RouteAlias;
use App\Http\Controllers\Admin\FoodItemController as FoodItemControllerAlias;
use App\Http\Controllers\Admin\ExtraFoodItemController as ExtraFoodItemControllerAlias;

RouteAlias::prefix('admin')->name('admin.')->group(callback: function(){
    RouteAlias::middleware(['web', 'admin.auth', 'admin.verified'])->group(callback: function(){
        RouteAlias::get('/dashboard', [AdminControllerAlias::class, 'dashboard'])->name('dashboard');
        RouteAlias::resource('banner', BannerControllerAlias::class);
        // Route::get('/banner/changeStatus/{id}', [BannerController::class, 'updateStatus'])->name('banner.changeStatus');
        RouteAlias::prefix('setting')->name('setting.')->group(callback: function(){
            RouteAlias::get('/genral', [SettingControllerAlias::class, 'genralsetting'])->name('genral');
            RouteAlias::put('/genral/{id}', [SettingControllerAlias::class, 'unregenerateSetting'])->name('genralstore');
            RouteAlias::get('/footer-setting', [SettingControllerAlias::class, 'footersetting'])->name('footersetting');
        });
        RouteAlias::resource('manage-pages', PageManagementControllerAlias::class);

        // food items
        RouteAlias::resource('food-items', FoodItemControllerAlias::class);
        RouteAlias::resource('extra-items', ExtraFoodItemControllerAlias::class);

        // testimonial
        RouteAlias::resource('testimonial', TestimonialsControllerAlias::class);

        // Menu's
        RouteAlias::resource('menu', MenuControllerAlias::class);

        // Blog
        RouteAlias::resource('blog', BlogControllerAlias::class);

        // Gallery Image
        RouteAlias::resource('manage-gallery', GalleryControllerAlias::class);

        // Manage Booking Details
        RouteAlias::prefix('booking')->name('booking.')->group(callback: function(){
            RouteAlias::get('/', [BookingControllerAlias::class, 'fetchBooking'])->name('index');
            RouteAlias::get('/view/{id}', [BookingControllerAlias::class, 'show'])->name('show');
        });



        RouteAlias::prefix('order')->name('order.')->group(function(){
            RouteAlias::get('/', [OrderManagemnetControllerAlias::class, 'index'])->name('index');
            RouteAlias::get('/view/{id}', [OrderManagemnetControllerAlias::class, 'viewOrder'])->name('show');
            RouteAlias::POST('/update-order', [OrderManagemnetControllerAlias::class, 'orderStatus'])->name('orderStatus');
            RouteAlias::POST('/update-status', [OrderManagemnetControllerAlias::class, 'ChangeOrderStatus'])->name('ChangeOrderStatus');

        });


//        Route::resource('order', OrderController::class);


        RouteAlias::prefix('manage-customer')->name('manage-customer.')->group(callback: function(){
            RouteAlias::get('/', [CustomerControllerAlias::class, 'index'])->name('index');
            RouteAlias::get('/view/{id}', [CustomerControllerAlias::class, 'show'])->name('view');
            RouteAlias::get('/control/{id}', [CustomerControllerAlias::class, 'control'])->name('control');

        });

    });
});
RouteAlias::group(['as' => 'admin.', 'prefix' => '/admin', 'middleware' => ['web', 'admin.auth']], function () {
    RouteAlias::get('/profile', [ProfileControllerAlias::class, 'edit'])->name('profile.edit');
    RouteAlias::patch('/profile', [ProfileControllerAlias::class, 'update'])->name('profile.update');
    RouteAlias::delete('/profile', [ProfileControllerAlias::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
