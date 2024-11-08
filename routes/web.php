<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/product/list', function () {
    return view('product-list');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/suppliers', function () {
        return view('suppliers');
    })->name('suppliers');
    Route::get('/branches', function () {
        return view('branches');
    })->name('branches');
    Route::get('/categories', function () {
        return view('categories');
    })->name('categories');
    Route::get('/products', function () {
        return view('products');
    })->name('products');
    Route::get('/main', function () {
        return view('main');
    })->name('main');
    Route::get('/shop', function () {
        return view('shop-total');
    })->name('shop');
});
