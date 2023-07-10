<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);
Route::post('products/search', [ProductController::class, 'search'])->name('products.search');
