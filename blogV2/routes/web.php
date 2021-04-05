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
        });
    

        // categogy
        Route::get('/category/add', function () {
            return view('admin.page.category.add');
        })->name('admin.category.add');
    
        Route::get('/category/list', function () {
            return view('admin.page.category.list');
        })->name('admin.category.list');
        

        // post
        Route::get('/post/add', function () {
            return view('admin.page.post.add');
        })->name('admin.post.add');
    
        Route::get('/post/list', function () {
            return view('admin.page.post.list');
        })->name('admin.post.list');

        
        // member
        Route::get('/member/create', [App\Http\Controllers\Admin\MemberController::class, 'createMember'])->name('admin.member.add');
        Route::post('/member/create', [App\Http\Controllers\Admin\MemberController::class, 'storeMember'])->name('admin.member.add');
        
        Route::get('/member/edit/{id}', [App\Http\Controllers\Admin\MemberController::class, 'editMember'])->name('admin.member.edit');
        Route::post('/member/edit/{id}', [App\Http\Controllers\Admin\MemberController::class, 'updateMember'])->name('admin.member.edit');
        
        Route::get('/member/delete/{id}', [App\Http\Controllers\Admin\MemberController::class, 'destroy'])->name('admin.member.delete');

        Route::get('/member', [App\Http\Controllers\Admin\MemberController::class, 'index'])->name('admin.member.list');

    });

    
});