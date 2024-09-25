<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CreditCardController;
use App\Http\Controllers\AdminBookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');
Route::get('/booking', [WelcomeController::class, 'booking'])->name('welcome.booking');
Route::get('/contact', [WelcomeController::class, 'contact'])->name('welcome.contact');
Route::get('/message', [WelcomeController::class, 'message'])->name('message');
Route::get('/rmessage', [WelcomeController::class, 'rmessage'])->name('rmessage');


/* USER */
Route::get('/register', [UserController::class, 'register'])->name('welcome.register');
Route::post('/user/create', [UserController::class, 'doCreate'])->name('user.docreate');
Route::post('/login', [UserController::class, 'doLogin'])->name('user.dologin');
Route::get('/logout', [UserController::class, 'doLogout'])->name('user.dologout');
Route::get('/login', [WelcomeController::class, 'login'])->name('welcome.login');
/* USER PROFILE */
Route::get('/profile', [UserController::class, 'profile'])->name('profile.index')->middleware('auth');
Route::post('/profile/edit', [UserController::class, 'edit'])->name('profile.edit')->middleware('auth');

/* CREDIT CARDS */
Route::post('/credit-cards/create', [CreditCardController::class, 'create'])->name('cards.create')->middleware('auth');
Route::delete('/credit-cards/{card}', [CreditCardController::class, 'destroy'])->name('cards.destroy')->middleware('auth');

/* CONTACT */
Route::post('/contact', [ContactController::class, 'contact'])->name('welcome.message');

/* DASHBOARD */
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

/* ADMIN */
Route::get('/admin/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings')->middleware('admin');

/* BOOKING */
Route::get('/booking/calendar', [BookingController::class, 'calendar'])->name('booking.calendar');
Route::post('/book', [BookingController::class, 'book'])->name('booking.book');
Route::delete('/booking/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');
