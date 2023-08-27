
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductLineController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
    Route::get('/orders',[OrderController::class,'index']); 
    Route::get('/orders/{orderNumber}',[OrderController::class,'show']); 
    Route::delete('/orders/{orderNumber}',[OrderController::class,'destroy']);
    Route::post('/orders',[OrderController::class,'store']); 
    Route::put('/orders/{orderNumber}',[OrderController::class,'update']);
    Route::get('/token',[OrderController::class,'index']);
    Route::get('/products',[ProductController::class,'index']);
    Route::get('/products/{productCode}',[ProductController::class,'show']);
    Route::post('/products',[ProductController::class,'store']);
    Route::put('/products/{productCode}',[ProductController::class,'update']);
    Route::delete('/products/{productCode}',[ProductController::class,'destroy']); 
   



