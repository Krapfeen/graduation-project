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

Route::get('/orders', function () {
    return view('orders');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::group(['prefix' => 'product'], function () {
    Route::get('/{id}', [\App\Http\Controllers\ProductController::class, 'store'])->name('product');
    Route::get('/create', function () {
        return view('product.create');
    })->name('product.create');
    Route::get('/{id?}/edit', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.edit');
    Route::get('/{id?}/edit/save', [\App\Http\Controllers\ProductController::class, 'edit'])->name('product.save');
    Route::get('/{id?}/delete', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');

    Route::get('/list', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.list');

    Route::get('/add', [\App\Http\Controllers\ProductController::class, 'add'])->name('product.add');
});



Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
