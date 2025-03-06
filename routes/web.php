<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DonationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pay', [PaymentController::class, 'pay']);
Route::get('/success', [PaymentController::class, 'success']);
Route::get('/listUser', [PaymentController::class, 'listUser']);
Route::get('/donate', [DonationController::class, 'index']);
