<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/categories-panel', function () {
    return view('components.admin.category-admin');
})->name('categories');

Route::get('/products-panel', function () {
    return view('components.admin.products-admin');
})->name('product-form');


Route::get('/{categorySlug}', function () {
    return view('components.category');
})->name('selectCategory');

Route::get('/{category}/{productSlug?}', function () {
    return view('components.product');
})->name('selectProduct');
