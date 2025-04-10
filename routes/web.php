<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/modal', function() {
    return view('components.modal');

});


Route::get('/', [ ProductController::class, 'index' ]);
Route::get('/product/{name}', [ ProductController::class, 'view' ]);
Route::get('/product/checkout', [ ProductController::class, 'checkout' ]);

