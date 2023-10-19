<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('contacts', [MainController::class, 'contacts'])->name('contacts');
Route::get('work-form', [MainController::class, 'workForm'])->name('work-form');
Route::get('reviews', [MainController::class, 'reviews'])->name('reviews');
Route::post('work-form', [MainController::class, 'sendWorkForm'])->name('sendWorkForm');
Route::post('reviews', [MainController::class, 'sendReview'])->name('sendReview');



Route::get('admin', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::resource('admin/reviews', ReviewsController::class);
