<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\SiteController::class,'home']);
Route::get('/conditions',[\App\Http\Controllers\SiteController::class,'conditions']);


Auth::routes();




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
