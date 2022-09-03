<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CouseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TeacherController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CouseController::class,'index'])->name('couse.index');

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('teachers',TeacherController::class);
});

Route::resource('couses',CouseController::class);

// Route::resource('booking',BookingController::class);
Route::post('apply/{couse}', [BookingController::class, 'apply'])->name('apply');
Route::post('checkCoupon/{couse}', [BookingController::class, 'checkCoupon'])->name('checkCoupon');
Route::get('confirm', [BookingController::class, 'confirm'])->name('confirm');
Route::post('payment', [BookingController::class, 'payment'])->name('payment');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
