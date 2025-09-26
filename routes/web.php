<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\OfferController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\TopHeaderController;
use App\Http\Controllers\Backend\WhoWeAreController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');





// -------------------------BACKEND--------------------------------------
// ======================================================================

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // 
    // 
    // Header and Footer Info
    Route::get('/top-header', [TopHeaderController::class, 'index'])->name('topHeader');
    Route::post('/top-header/store', [TopHeaderController::class, 'store'])->name('topHeaderStore');
    Route::get('/top-header-edit/{id}', [TopHeaderController::class, 'edit'])->name('topHeaderEdit');
    Route::post('/top-header-update/{id}', [TopHeaderController::class, 'update'])->name('topHeaderUpdate');
    Route::get('/top-header-delete/{id}', [TopHeaderController::class, 'destroy'])->name('topHeaderDestroy');
    //
    //
    // Slider
    Route::get('/slider', [SliderController::class, 'index'])->name('slider');
    Route::post('/slider/store', [SliderController::class, 'store'])->name('sliderStore');
    Route::get('/slider-edit/{id}', [SliderController::class, 'edit'])->name('sliderEdit');
    Route::post('/slider-update/{id}', [SliderController::class, 'update'])->name('sliderUpdate');
    Route::get('/slider-delete/{id}', [SliderController::class, 'destroy'])->name('sliderDestroy');
    //
    //
    // Banner 
    Route::get('/banner', [BannerController::class, 'index'])->name('banner');
    Route::post('/banner/store', [BannerController::class, 'store'])->name('bannerStore');
    Route::get('/banner-edit/{id}', [BannerController::class, 'edit'])->name('bannerEdit');
    Route::post('/banner-update/{id}', [BannerController::class, 'update'])->name('bannerUpdate');
    Route::get('/banner-delete/{id}', [BannerController::class, 'destroy'])->name('bannerDestroy');






    // Who We Are 
    Route::get('/who-we-are', [WhoWeAreController::class, 'index'])->name('whoWeAre');
    Route::get('/who-we-are/create', [WhoWeAreController::class, 'create'])->name('whoWeAreCreate');
    Route::post('/who-we-are/store', [WhoWeAreController::class, 'store'])->name('whoWeAreStore');
    Route::get('/who-we-are-edit/{id}', [WhoWeAreController::class, 'edit'])->name('whoWeAreEdit');
    Route::post('/who-we-are-update/{id}', [WhoWeAreController::class, 'update'])->name('whoWeAreUpdate');
    Route::get('/who-we-are-delete/{id}', [WhoWeAreController::class, 'destroy'])->name('whoWeAreDestroy');











    // What We Offer 
    Route::get('/offer', [OfferController::class, 'index'])->name('offer');
    Route::post('/offer/store', [OfferController::class, 'store'])->name('offerStore');
    Route::get('/offer-edit/{id}', [OfferController::class, 'edit'])->name('offerEdit');
    Route::post('/offer-update/{id}', [OfferController::class, 'update'])->name('offerUpdate');
    Route::get('/offer-delete/{id}', [OfferController::class, 'destroy'])->name('offerDestroy');

    // Team 
    Route::get('/team', [TeamController::class, 'index'])->name('team');
    Route::post('/team/store', [TeamController::class, 'store'])->name('teamStore');
    Route::get('/team-edit/{id}', [TeamController::class, 'edit'])->name('teamEdit');
    Route::post('/team-update/{id}', [TeamController::class, 'update'])->name('teamUpdate');
    Route::get('/team-delete/{id}', [TeamController::class, 'destroy'])->name('teamDestroy');

    // Testimonial 
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial');
    Route::post('/testimonial/store', [TestimonialController::class, 'store'])->name('testimonialStore');
    Route::get('/testimonial-edit/{id}', [TestimonialController::class, 'edit'])->name('testimonialEdit');
    Route::post('/testimonial-update/{id}', [TestimonialController::class, 'update'])->name('testimonialUpdate');
    Route::get('/testimonial-delete/{id}', [TestimonialController::class, 'destroy'])->name('testimonialDestroy');
});

// ======================================================================
// ------------------------BACKEND END-----------------------------------
