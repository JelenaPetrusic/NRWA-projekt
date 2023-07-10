<?php


use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductLineController;

Route::resource('products', ProductController::class);
Route::resource('product-lines', ProductLineController::class);
