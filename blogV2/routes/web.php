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
    Route::get('login', [App\Http\Controllers\AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\AdminController::class, 'adminLogin'])->name('admin.login');
    Route::get('logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');

    Route::get('logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/', function () {
            return view('admin.home');
        });
    
        Route::get('/category/add', function () {
            return view('admin.page.category.add');
        })->name('admin.categoryAdd');
    
        Route::get('/category/list', function () {
            return view('admin.page.category.list');
        })->name('admin.categoryList');
        
        Route::get('/post/add', function () {
            return view('admin.page.post.add');
        })->name('admin.postAdd');
    
        Route::get('/post/list', function () {
            return view('admin.page.post.list');
        })->name('admin.postList');

        Route::get('/member/add', [App\Http\Controllers\AdminController::class, 'createMember'])->name('admin.memberAdd');
        Route::post('/member/add', [App\Http\Controllers\AdminController::class, 'storeMember'])->name('admin.memberAdd');
        
        // Route::get('/member/add', function () {
        //     return view('admin.page.member.add');
        // });
    
        Route::get('/member/list', function () {
            return view('admin.page.member.list');
        })->name('admin.memberList');
    });

    
});