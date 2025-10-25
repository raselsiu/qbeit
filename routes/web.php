<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactController as BackendContactController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\OfferController;
use App\Http\Controllers\Backend\PostsController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\TopHeaderController;
use App\Http\Controllers\Backend\WhoWeAreController;
use App\Http\Controllers\Backend\WhyChooseUsController;
use App\Http\Controllers\Backend\WorkWithUsController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use App\Models\Contact;
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



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');



// -------------------------BACKEND--------------------------------------
// ======================================================================

Route::prefix('dashboard')->middleware('auth')->group(function () {
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
    Route::get('/what-we-offer/create', [OfferController::class, 'create'])->name('whatWeOfferCreate');
    Route::post('/what-we-offer/store', [OfferController::class, 'store'])->name('whatWeOfferStore');
    Route::get('/what-we-offer-edit/{id}', [OfferController::class, 'edit'])->name('whatWeOfferEdit');
    Route::post('/what-we-offer-update/{id}', [OfferController::class, 'update'])->name('whatWeOfferUpdate');
    Route::get('/what-we-offer-delete/{id}', [OfferController::class, 'destroy'])->name('whatWeOfferDestroy');

    // Team
    Route::get('/team', [TeamController::class, 'index'])->name('team');
    Route::get('/team/create', [TeamController::class, 'create'])->name('teamCreate');
    Route::post('/team/store', [TeamController::class, 'store'])->name('teamStore');
    Route::get('/team-edit/{id}', [TeamController::class, 'edit'])->name('teamEdit');
    Route::post('/team-update/{id}', [TeamController::class, 'update'])->name('teamUpdate');
    Route::get('/team-delete/{id}', [TeamController::class, 'destroy'])->name('teamDestroy');

    // Testimonial
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial');
    Route::get('/testimonial/create', [TestimonialController::class, 'create'])->name('testimonialCreate');
    Route::post('/testimonial/store', [TestimonialController::class, 'store'])->name('testimonialStore');
    Route::get('/testimonial-edit/{id}', [TestimonialController::class, 'edit'])->name('testimonialEdit');
    Route::post('/testimonial-update/{id}', [TestimonialController::class, 'update'])->name('testimonialUpdate');
    Route::get('/testimonial-delete/{id}', [TestimonialController::class, 'destroy'])->name('testimonialDestroy');

    // Why Choose Us
    Route::get('/why-choose-us', [WhyChooseUsController::class, 'index'])->name('whyChooseUs');
    Route::get('/why-choose-us/create', [WhyChooseUsController::class, 'create'])->name('whyChooseUsCreate');
    Route::post('/why-choose-us/store', [WhyChooseUsController::class, 'store'])->name('whyChooseUsStore');
    Route::get('/why-choose-us-edit/{id}', [WhyChooseUsController::class, 'edit'])->name('whyChooseUsEdit');
    Route::post('/why-choose-us-update/{id}', [WhyChooseUsController::class, 'update'])->name('whyChooseUsUpdate');
    Route::get('/why-choose-us-delete/{id}', [WhyChooseUsController::class, 'destroy'])->name('whyChooseUsDestroy');

    // Posts
    Route::get('/posts', [PostsController::class, 'index'])->name('posts');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('postsCreate');
    Route::post('/posts/store', [PostsController::class, 'store'])->name('postsStore');
    Route::get('/posts-edit/{id}', [PostsController::class, 'edit'])->name('postsEdit');
    Route::post('/posts-update/{id}', [PostsController::class, 'update'])->name('postsUpdate');
    Route::get('/posts-delete/{id}', [PostsController::class, 'destroy'])->name('postsDestroy');


    // Work With Us
    Route::get('/work-with-us', [WorkWithUsController::class, 'index'])->name('workWithUs');
    Route::get('/work-with-us/create', [WorkWithUsController::class, 'create'])->name('workWithUsCreate');
    Route::post('/work-with-us/store', [WorkWithUsController::class, 'store'])->name('workWithUsStore');
    Route::get('/work-with-us-edit/{id}', [WorkWithUsController::class, 'edit'])->name('workWithUsEdit');
    Route::post('/work-with-us-update/{id}', [WorkWithUsController::class, 'update'])->name('workWithUsUpdate');
    Route::get('/work-with-us-delete/{id}', [WorkWithUsController::class, 'destroy'])->name('workWithUsDestroy');


    // Service Category
    Route::get('/service-category', [CategoryController::class, 'index'])->name('serviceCategory');
    Route::get('/service-category/create', [CategoryController::class, 'create'])->name('serviceCategoryCreate');
    Route::post('/service-category/store', [CategoryController::class, 'store'])->name('serviceCategoryStore');
    Route::get('/service-category-edit/{id}', [CategoryController::class, 'edit'])->name('serviceCategoryEdit');
    Route::post('/service-category-update/{id}', [CategoryController::class, 'update'])->name('serviceCategoryUpdate');
    Route::get('/service-category-delete/{id}', [CategoryController::class, 'destroy'])->name('serviceCategoryDestroy');

    // Contact Messages
       Route::get('/contact-messages', [BackendContactController::class, 'index'])->name('allContactMessages');
       Route::get('/contact-messages/{id}', [BackendContactController::class, 'edit'])->name('editContactMessage');
       Route::get('delete/contact-messages/{id}', [BackendContactController::class, 'destroy'])->name('deleteContactMessage');
});

// ======================================================================
// ------------------------BACKEND END-----------------------------------

// Frontend Route
Route::get('/', [FrontPageController::class, 'welcomePage'])->name('welcomePage');
Route::get('/service/{slug}', [FrontPageController::class, 'singleService'])->name('singleService');
Route::get('/post/{slug}', [FrontPageController::class, 'singlePost'])->name('singlePost');
Route::get('/contact-us', [FrontPageController::class, 'contactus'])->name('contactus');
Route::post('/contact-store', [ContactController::class, 'store'])->name('storeContact');
Route::get('/posts', [FrontPageController::class, 'posts'])->name('posts');
Route::get('/posts/category/{categoryName}', [FrontPageController::class, 'findPostByCategory'])->name('findPostByCategory');

// Frontend Route End
