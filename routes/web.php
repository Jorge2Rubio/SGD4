<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DonationController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/donate', function () {
    return view('donate-now');
})->name('donate-now');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/about', function(){
    return view('about');
});



Route::post('/pay', [PaymentController::class, 'pay'])->name('payment.pay');
Route::get('/success', [PaymentController::class, 'success']);
Route::get('/listUser', [PaymentController::class, 'listUser']);