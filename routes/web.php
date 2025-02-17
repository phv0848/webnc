<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RepCommentController;
use App\Http\Controllers\ReviewController;
use App\Models\Booking;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [CarController::class,'CarHome']);

Route::get('/filter-cars', [CarController::class, 'filterCars'])->name('filter.cars');
Route::get('/car', [CarController::class, 'index'])->name('car.index');
Route::get('/car/show/{id}',[CarController::class,'show'])->name('car.show');


Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/car', CarController::class)->names('car')->except(['index','show']);
    Route::resource('/booking', BookingController::class)->names('bookings');
    Route::get('/booking/add_book/{car_id}/{price_per_day}', [BookingController::class, 'create'])->name('bookings.create');
});
Route::middleware('auth','role:admin')->group(function(){
    Route::get('/car/create', [CarController::class, 'create'])->name('car.create');
    Route::delete('/car/{id}',[CarController::class,'destroy'])->name('car.destroy');
    Route::get('/car/{id}/edit', [CarController::class, 'edit'])->name('car.edit');
    Route::put('/car/{id}', [CarController::class, 'update'])->name('car.update');
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
    Route::post('/admin/bookings/{id}',[AdminController::class,'approveBooking'])->name('admin.approveBooking');
    Route::post('/admin/bookings/adminGiveBack/{id}',[AdminController::class,'adminGiveBack'])->name('admin.adminGiveBack');
});
Route::get('/booking/{id}/edit',[BookingController::class, 'edit'])->name('booking.edit');
Route::get('/booking/{id}',[BookingController::class, 'update'])->name('booking.update');
Route::delete('/booking/{id}',[CarController::class,'destroy'])->name('booking.destroy');
Route::get('/review/create',[ReviewController::class,'create'])->name('review.create');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::post('/repcomments/store', [RepCommentController::class, 'store'])->name('repcomments.store');
Route::get('/about',function(){
    return view('user.about');
});
Route::view('/feedback', 'user.feedback');
Route::view('/contact', 'user.contact');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
require __DIR__.'/auth.php';
