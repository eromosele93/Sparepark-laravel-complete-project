<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MyBookingController;
use App\Http\Controllers\MySpaceContrller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\SpaceOwnerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('spaces', SpaceController::class)->only(['index', 'show']);
Route::resource('register', RegisterController::class)->only(['create', 'store']);
Route::resource('auth', AuthController::class)->only(['create', 'store']);
Route::get('login', fn()=>to_route('auth.create'))->name('login');
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');
Route::middleware('auth')->group(function(){
    Route::middleware('space-owner')->resource('my-space', MySpaceContrller::class);
Route::resource('my-booking', MyBookingController::class )->only('index', 'show', 'destroy');
Route::resource('space-owner', SpaceOwnerController::class)->only(['create', 'store', 'index', 'update']);
Route::resource('space.booking', BookingController::class)->only(['create', 'store']);
Route::resource('booking.review', ReviewController::class)->only([ 'store']);

    });
