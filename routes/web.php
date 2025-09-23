<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\TopHeaderController;
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
});

// ======================================================================
// ------------------------BACKEND END-----------------------------------
