<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ServicesController;

use App\Http\Controllers\Admin\TeamController;

// Seller controllers start
use App\Http\Controllers\Seller\SellerAuthController;

// Seller controllers ends
Route::get('/', function () {
    return view('frontend.welcome');
});
// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->name('dashboard');


Route::prefix('admin')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        // Blog Category Routes
        // Resource Routes
        Route::resource('blog-categories', BlogCategoryController::class);
        Route::post('blog-categories-toggle-status', [BlogCategoryController::class, 'toggleStatus'])->name('blog-categories-toggle-status');
        Route::resource('services', ServicesController::class);
        Route::post('services-toggle-status', [ServicesController::class, 'toggleStatus'])->name('services-toggle-status');


        Route::resource('blogs', BlogController::class);
        Route::resource('teams', TeamController::class);
        Route::post('toggle-status', [TeamController::class, 'toggleStatus'])->name('toggle-status');

    });
});


Route::prefix('seller')->group(function () {
    Route::get('register', [SellerAuthController::class, 'showRegisterForm'])->name('seller.register');
    Route::post('register', [SellerAuthController::class, 'submitRegisterForm'])->name('seller.register.submit');

    Route::get('login', [SellerAuthController::class, 'showLoginForm'])->name('seller.login');
    Route::post('login', [SellerAuthController::class, 'login'])->name('seller.login.submit');
    Route::post('logout', [SellerAuthController::class, 'logout'])->name('seller.logout');

  Route::middleware(['auth:seller'])->group(function () {
    Route::get('dashboard', function () {
        return view('seller.dashboard');
    })->name('seller.dashboard');
});

});