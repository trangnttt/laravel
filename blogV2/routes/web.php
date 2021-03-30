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
// $password = bcrypt(123456);
// var_dump($password);
Route::get('/', function () {
    return view('client.home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('admin/login', function () {
//     return view('admin.auth.login');
// })->name('login');'Admin@showLoginForm'
//  [App\Http\Controllers\Admin::class, 'showLoginForm']
// Route::get('admin/login', [App\Http\Controllers\AdminController::class, 'showLoginForm'])->name('admin.login');
// Route::post('admin/login', [App\Http\Controllers\AdminController::class, 'adminLogin']);

Route::group( [ 'prefix' => 'admin'], function()
{
    Route::get('admin/login', [App\Http\Controllers\AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('admin/login', [App\Http\Controllers\AdminController::class, 'adminLogin'])->name('admin.login');
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/', function () {
            return view('admin.home');
        });
    
        Route::get('/category/add', function () {
            return view('admin.page.category.add');
        });
    
        Route::get('/category/list', function () {
            return view('admin.page.category.list');
        });
        
        Route::get('/post/add', function () {
            return view('admin.page.post.add');
        });
    
        Route::get('/post/list', function () {
            return view('admin.page.post.list');
        });
    });

    
});