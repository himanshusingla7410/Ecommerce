<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/cart',[CartController::class,'index']);
Route::get('/cart/delete',[CartController::class,'destroy'])->name('cart.delete');
Route::post('/product/cart', [ CartController::class, 'store' ]);
Route::delete('/product/cart', [ CartController::class, 'destroy' ]);

Route::get('/', [ ProductController::class, 'welcome' ]);
Route::get('/products', [ ProductController::class, 'index' ]);
Route::get('/product/{name}', [ ProductController::class, 'show' ]);
Route::get('/product/checkout', [ ProductController::class, 'checkout' ]);

