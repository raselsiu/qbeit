<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\TopHeaderController;
use App\Http\Controllers\HomeController;
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
});

// ======================================================================
// ------------------------BACKEND END-----------------------------------
