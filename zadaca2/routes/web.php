<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController; 

// Otkomentirajte i prilagodite rute za ProductController ako su potrebne
// Route::resource('products', ProductController::class);
// Route::post('products/search', [ProductController::class, 'search'])->name('products.search');

Route::get('/', [SearchController::class, 'index']); // Dodajte ovu rutu
Route::get('/search', [SearchController::class, 'search'])->name('search'); // Dodajte ovu rutu
