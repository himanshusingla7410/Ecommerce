<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\RegisterationController;
use App\Http\Controllers\ShippingController;
use Illuminate\Support\Facades\Route;



Route::get('/cart', [CartController::class, 'index']);
Route::get('/cart/delete', [CartController::class, 'destroy'])->name('cart.delete');
Route::post('/product/cart', [CartController::class, 'store']);
Route::delete('/product/cart', [CartController::class, 'destroy']);

Route::get('/', [ProductController::class, 'welcome'])->middleware('cacheResponse:300');
Route::get('/products', [ProductController::class, 'index'])->middleware('cacheResponse:300');
Route::get('/product/{name}', [ProductController::class, 'show']);
Route::get('/product/checkout', [ProductController::class, 'checkout']);

Route::get('/coupon', [CouponController::class, 'index']);


Route::post('/placeorder', [ShippingController::class, 'index']);
Route::post('/address', [ShippingController::class, 'store']);
Route::get('/address/{id}', [ShippingController::class, 'edit']);

Route::get('/login', [RegisterationController::class, 'index'])->name('login');
Route::post('/login', [RegisterationController::class, 'store']);

Route::post('/createOrder', [RazorpayController::class, 'createOrder']);