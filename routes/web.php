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
    return view('index');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/post', function () {
    return view('post');
});

Route::get('/category', function () {
    return view('category');
});

Route::get('/cart1', function () {
    return view('cart1');
});

Route::get('/cart2', function () {
    return view('cart2');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
