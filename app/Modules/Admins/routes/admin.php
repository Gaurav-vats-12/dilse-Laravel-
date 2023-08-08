<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\{BannerController,SettingController,PageManagementController,TestimonialsController,MenuController,BlogController,GalleryController,CustomerController};
use App\Modules\Admins\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FoodItemController;
use App\Http\Controllers\Admin\ExtraFoodItemController;

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['web', 'admin.auth', 'admin.verified'])->group(function(){
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('banner', BannerController::class);
        // Route::get('/banner/changeStatus/{id}', [BannerController::class, 'updateStatus'])->name('banner.changeStatus');
        Route::prefix('setting')->name('setting.')->group(function(){
            Route::get('/genral', [SettingController::class, 'genralsetting'])->name('genral');
            Route::put('/genral/{id}', [SettingController::class, 'updategenralSetting'])->name('genralstore');
            Route::get('/footer-setting', [SettingController::class, 'footersetting'])->name('footersetting');
        });
        Route::resource('manage-pages', PageManagementController::class);

        // food items
        Route::resource('food-items', FoodItemController::class);
        Route::resource('extra-items', ExtraFoodItemController::class);

        // testimonial
        Route::resource('testimonial', TestimonialsController::class);

        // Menu's
        Route::resource('menu', MenuController::class);

        // Blog
        Route::resource('blog', BlogController::class);

        // Gallery Image
        Route::resource('manage-gallery', GalleryController::class);


        Route::prefix('manage-customer')->name('manage-customer.')->group(function(){
            Route::get('/', [CustomerController::class, 'index'])->name('index');
            Route::get('/view/{id}', [CustomerController::class, 'show'])->name('view');
            Route::get('/control/{id}', [CustomerController::class, 'control'])->name('control');
        });

    });
});
// Route::middleware(['web', 'admin.auth', 'admin.verified'])->get('/admin', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');

Route::group(['as' => 'admin.', 'prefix' => '/admin', 'middleware' => ['web', 'admin.auth']], function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
