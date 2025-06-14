<?php

use App\Http\Controllers\RazorpayController;
use Illuminate\Support\Facades\Route;



Route::post('/verifyPayment', [RazorpayController::class, 'paymentVerification']);
