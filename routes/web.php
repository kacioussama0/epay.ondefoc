<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\SiteController::class,'home']);
Route::get('/conditions',[\App\Http\Controllers\SiteController::class,'conditions']);


Auth::routes();

Route::get('/receipt/{orderId}', [\App\Http\Controllers\OrderController::class, 'generateReceipt']);
Route::get('/receipt/{orderId}/email', [\App\Http\Controllers\OrderController::class, 'sendReceipt']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('payment')->group(function () {
    Route::get('callback', [\App\Http\Controllers\PaymentController::class, 'callback']);
    Route::get('result', [\App\Http\Controllers\PaymentController::class, 'result']);
    Route::get('check/{orderId}', [\App\Http\Controllers\OrderController::class, 'check']);
});

Route::get('/products',[\App\Http\Controllers\SiteController::class,'products']);
Route::get('/products/{slug}',[\App\Http\Controllers\SiteController::class,'product']);
Route::post('/products/{slug}/payment',[\App\Http\Controllers\PaymentController::class,'pay'])->name('payment');

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::resource('/orders',\App\Http\Controllers\OrderController::class);
    Route::resource('/products', \App\Http\Controllers\ProductController::class);
    Route::resource('/categories', \App\Http\Controllers\CategoryController::class);
});



//Route::fallback(function () {
//    return response()->view('errors.custom', [
//        'code' => 404,
//        'message' => 'الصفحة غير موجودة'
//    ], 404);
//});
//
//Route::get('/error/{code}', function ($code) {
//    $messages = [
//        403 => 'ليس لديك إذن للوصول إلى هذه الصفحة.',
//        404 => 'الصفحة غير موجودة.',
//        500 => 'حدث خطأ داخلي في الخادم.',
//    ];
//
//    return response()->view('errors.custom', [
//        'code' => $code,
//        'message' => $messages[$code] ?? 'حدث خطأ غير معروف.',
//    ], $code);
//
//})->where('code', '[0-9]+');
