<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\SiteController::class,'home']);
Route::get('/conditions',[\App\Http\Controllers\SiteController::class,'conditions']);


Auth::routes();

Route::get('/receipt/{orderId}', [\App\Http\Controllers\OrderController::class, 'generateReceipt']);
Route::get('/receipt/{orderId}/email', [\App\Http\Controllers\OrderController::class, 'sendReceipt']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/payment/callback', [\App\Http\Controllers\SiteController::class, 'callback']);
Route::get('/payment/success', [\App\Http\Controllers\SiteController::class, 'success']);
Route::get('/payment/failed', [\App\Http\Controllers\SiteController::class, 'failed']);

Route::get('/products',[\App\Http\Controllers\SiteController::class,'products']);
Route::get('/products/{slug}',[\App\Http\Controllers\SiteController::class,'product']);
Route::post('/products/{slug}/payment',[\App\Http\Controllers\SiteController::class,'order'])->name('payment');

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::resource('/orders',\App\Http\Controllers\OrderController::class);
    Route::resource('/products', \App\Http\Controllers\ProductController::class);
    Route::resource('/categories', \App\Http\Controllers\CategoryController::class);
});



