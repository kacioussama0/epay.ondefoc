<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\SiteController::class,'home']);
Route::get('/conditions',[\App\Http\Controllers\SiteController::class,'conditions']);


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/payment',[\App\Http\Controllers\SiteController::class,'order']);
Route::get('/payment/callback', [\App\Http\Controllers\SiteController::class, 'callback']);
Route::get('/payment/success', [\App\Http\Controllers\SiteController::class, 'success']);
Route::get('/payment/failed', [\App\Http\Controllers\SiteController::class, 'failed']);

Route::get('/products',[\App\Http\Controllers\SiteController::class,'products']);
Route::get('/products/{slug}',[\App\Http\Controllers\SiteController::class,'product']);
Route::post('/products/{slug}',[\App\Http\Controllers\SiteController::class,'order']);

Route::resource('/orders',\App\Http\Controllers\OrderController::class);
