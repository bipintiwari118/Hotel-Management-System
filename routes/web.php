<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;

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

// Routes for frontend
Route::get('/',[HomeController::class,'index']);
Route::get('/register',[HomeController::class, 'register'])->name('register');
Route::post('/register',[HomeController::class, 'store'])->name('customer.register');
Route::get('/login',[HomeController::class, 'login'])->name('login');
Route::post('/login',[HomeController::class, 'checkLogin'])->name('customer.login');
Route::get('/logout',[HomeController::class, 'Logout'])->name('customer.logout');

// routes for backend

Route::get('admin',[AdminController::class, 'dashboard'])->middleware('admin.auth');
Route::get('admin/login',[AdminController::class, 'login']);
Route::post('admin/login',[AdminController::class, 'checkLogin'])->name('admin.login');
Route::get('admin/logout',[AdminController::class, 'logout'])->name('admin.logout');
// Route for Roomtype
Route::get('admin/roomtype/{id}/delete',[RoomTypeController::class,'destroy']);
Route::resource('admin/roomtype',RoomTypeController::class);

// Route for Room
Route::get('admin/room/{id}/delete',[RoomController::class,'destroy']);
Route::resource('admin/room',RoomController::class);


Route::get('admin/customer/{id}/delete',[CustomerController::class,'destroy']);
Route::resource('admin/customer',CustomerController::class);

// route for booking
Route::get('admin/booking/avaliable-rooms/{checkin_date}',[BookingController::class,'avaliable_rooms']);
Route::get('admin/booking/{id}/delete',[BookingController::class,'destroy']);
Route::resource('admin/booking',BookingController::class);
Route::get('/booking',[BookingController::class, 'booking'])->name('booking');




