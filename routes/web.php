<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/destinations', [HomeController::class, 'destinations'])->name('destinations');
Route::get('/packages', [HomeController::class, 'packages'])->name('packages');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog-details/{id?}', [HomeController::class, 'blogDetails'])->name('blog.details');
Route::get('/package-details/{id?}', [HomeController::class, 'packageDetails'])->name('package.details');

Route::get('/login-signup', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');
Route::get('/loading', [AuthController::class, 'loading'])->name('loading');

Route::post('/book', [BookingController::class, 'store'])->name('book');
Route::post('/contact/submit', [ContactController::class, 'store'])->name('contact.submit');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/booking/{id}/update', [AdminController::class, 'updateBookingStatus'])->name('booking.update');
});
