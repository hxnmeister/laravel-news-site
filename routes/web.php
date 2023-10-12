<?php

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

Route::post('work-form', [MainController::class, 'sendWorkForm'])->name('sendWorkForm');
