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


Route::get('/', [App\Http\Controllers\Client\PageControler::class, 'getIndex'])->name('client.home');


Route::get('/product_type/{id}', [App\Http\Controllers\Client\PageControler::class, 'getProductType'])->name('client.product_type');
Route::get('/product_detail/{id}', [App\Http\Controllers\Client\PageControler::class, 'getProductDetail'])->name('client.product_detail');
Route::get('/about', [App\Http\Controllers\Client\PageControler::class, 'getAbout'])->name('client.about');
Route::get('/contact', [App\Http\Controllers\Client\PageControler::class, 'getContact'])->name('client.contact');

Route::get('/add-to-cart/{id}', [App\Http\Controllers\Client\PageControler::class, 'getAddCart'])->name('client.add_cart');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
