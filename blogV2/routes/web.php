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

Route::group( [ 'prefix' => 'admin'], function()
{
    // login
    Route::get('login', [App\Http\Controllers\Admin\AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\Admin\AdminController::class, 'adminLogin'])->name('admin.login');
   
    // logout
    Route::get('logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/', function () {
            return view('admin.home');
        })->name('admin.home');
        // categogy

        Route::get('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category.add');
        Route::post('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.add');
         
        Route::post('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.edit');
        
        Route::get('/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.category.delete');


        Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category');
        

        // post
        Route::get('/post/create', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('admin.post.add');
        Route::post('/post/create', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('admin.post.add');
        
        Route::get('/post/edit/{slug}', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('admin.post.edit');
        Route::post('/post/edit/{slug}', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('admin.post.edit');
        
        Route::get('/post/delete/{id}', [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('admin.post.delete');

        Route::get('/post/list', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('admin.post.list');


        // member
        Route::get('/member/create', [App\Http\Controllers\Admin\MemberController::class, 'create'])->name('admin.member.add');
        Route::post('/member/create', [App\Http\Controllers\Admin\MemberController::class, 'store'])->name('admin.member.add');
        
        Route::get('/member/edit/{id}', [App\Http\Controllers\Admin\MemberController::class, 'edit'])->name('admin.member.edit');
        Route::post('/member/edit/{id}', [App\Http\Controllers\Admin\MemberController::class, 'update'])->name('admin.member.edit');
        
        Route::get('/member/delete/{id}', [App\Http\Controllers\Admin\MemberController::class, 'destroy'])->name('admin.member.delete');

        Route::get('/member', [App\Http\Controllers\Admin\MemberController::class, 'index'])->name('admin.member.list');
        Route::get('member/search', [App\Http\Controllers\Admin\MemberController::class, 'index'])->name('admin.search');


    });

    
});