<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RazorpayController;
use Illuminate\Support\Facades\Route;



Route::post('/verifyPayment', [RazorpayController::class, 'paymentVerification']);
Route::get('/filter', [ProductController::class, 'filter']);
