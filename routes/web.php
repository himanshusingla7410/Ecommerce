<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index.welcome');
});


Route::get('/product', [ ProductController::class, 'view' ]);
Route::get('/product/checkout', [ ProductController::class, 'checkout' ]);