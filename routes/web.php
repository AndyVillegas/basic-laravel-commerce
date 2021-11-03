<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Website\PageController::class,'home'])->name('page.home');
Route::get('/productos', [\App\Http\Controllers\Website\PageController::class,'products'])->name('page.products');
Route::get('/mi-carrito', [\App\Http\Controllers\Website\PageController::class,'my_cart'])
    ->middleware(['auth:sanctum'])
    ->name('page.my-cart');

Route::post('/mi-carrito', [\App\Http\Controllers\Website\OrderController::class,'create_or_update_order_item'])
    ->middleware(['auth:sanctum'])
    ->name('website.order_item.store');
Route::delete('/mi-carrito/{orderItem}', [\App\Http\Controllers\Website\OrderController::class,'destroy_order_item'])
    ->middleware(['auth:sanctum'])
    ->name('website.order_item.destroy');
Route::patch('/mi-carrito', [\App\Http\Controllers\Website\OrderController::class,'confirm_order'])
    ->middleware(['auth:sanctum'])
    ->name('website.order.confirm');
Route::delete('/mi-carrito', [\App\Http\Controllers\Website\OrderController::class,'cancel_order'])
    ->middleware(['auth:sanctum'])
    ->name('website.order.cancel');

// Admin Pages
Route::resource('/order', \App\Http\Controllers\OrderController::class)
    ->middleware(['auth:sanctum','admin'])
    ->except('show');
Route::resource('/category', \App\Http\Controllers\CategoryController::class)
    ->middleware(['auth:sanctum','admin'])
    ->except('show');
Route::resource('/product', \App\Http\Controllers\ProductController::class)
    ->middleware(['auth:sanctum','admin'])
    ->except('show');

Route::middleware(['auth:sanctum', 'verified','admin'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
