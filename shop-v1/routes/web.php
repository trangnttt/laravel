<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\Client\PageControler::class, 'getIndex'])->name('client.home');

Route::get('/product_type/{id}', [App\Http\Controllers\Client\PageControler::class, 'getProductType'])->name('client.product_type');
Route::get('/product_detail/{id}', [App\Http\Controllers\Client\PageControler::class, 'getProductDetail'])->name('client.product_detail');
Route::get('/about', [App\Http\Controllers\Client\PageControler::class, 'getAbout'])->name('client.about');
Route::get('/contact', [App\Http\Controllers\Client\PageControler::class, 'getContact'])->name('client.contact');

Route::post('/add-to-cart', [App\Http\Controllers\Client\PageControler::class, 'getAddtoCart'])->name('client.add_cart');

Route::post('/update-to-cart', [App\Http\Controllers\Client\PageControler::class, 'getUpdateCart'])->name('client.update_cart');

Route::get('/delete-to-cart', [App\Http\Controllers\Client\PageControler::class, 'deletetoCart'])->name('client.delete_cart');

Route::get('/order', [App\Http\Controllers\Client\PageControler::class, 'getOrder'])->name('client.order');
Route::post('/order', [App\Http\Controllers\Client\PageControler::class, 'postOrder'])->name('client.order');

Route::get('/search-product', [App\Http\Controllers\Client\PageControler::class, 'getSearch'])->name('client.search_product');

Route::get('/sign-in', [App\Http\Controllers\Client\UserController::class, 'index'])->name('client.signin');
Route::post('/sign-in', [App\Http\Controllers\Client\UserController::class, 'postLogin'])->name('client.signin');

Route::get('/sign-up', [App\Http\Controllers\Client\UserController::class, 'create'])->name('client.signup');
Route::post('/sign-up', [App\Http\Controllers\Client\UserController::class, 'store'])->name('client.signup');

Route::get('/log-out', [App\Http\Controllers\Client\UserController::class, 'logout'])->name('client.logout');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
    // login
    Route::get('login', [App\Http\Controllers\Admin\AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\Admin\AdminController::class, 'adminLogin'])->name('admin.login');

    // forget-password
    Route::get('/auth/passwords/reset', [App\Http\Controllers\Admin\AdminController::class, 'forgetPassword'])->name('admin.forgetpass');
    Route::post('/auth/passwords/reset', [App\Http\Controllers\Admin\AdminController::class, 'updatePassword'])->name('admin.forgetpass');


    // logout
    Route::get('logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin.logout');


    Route::group(['middleware' => ['admin']], function () {

        Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.home');
        
        // slide
        Route::get('/slide', [App\Http\Controllers\Admin\SlideController::class, 'index'])->name('admin.slide');
        Route::get('/slide/create', [App\Http\Controllers\Admin\SlideController::class, 'create'])->name('admin.slide.add');
        Route::post('/slide/create', [App\Http\Controllers\Admin\SlideController::class, 'store'])->name('admin.slide.add');

        Route::get('/slide/delete/{id}', [App\Http\Controllers\Admin\SlideController::class, 'destroy'])->name('admin.slide.delete');


        // product
        Route::get('/product', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.product.list');
        
        Route::get('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.product.add');
        Route::post('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.product.add');
        
        Route::get('/product/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.product.edit');  
        Route::post('/product/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.product.edit');  

        Route::get('/product/delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin.product.delete');

        // product type
        Route::get('/product-type/create', [App\Http\Controllers\Admin\ProductTypeController::class, 'index'])->name('admin.product-type.list');
        Route::post('/product-type/create', [App\Http\Controllers\Admin\ProductTypeController::class, 'store'])->name('admin.product-type.add');

        Route::post('/product-type/edit/{id}', [App\Http\Controllers\Admin\ProductTypeController::class, 'update'])->name('admin.product-type.edit');
        
        Route::get('/product-type/delete/{id}', [App\Http\Controllers\Admin\ProductTypeController::class, 'destroy'])->name('admin.product-type.delete');

        Route::get('/product-type', [App\Http\Controllers\Admin\ProductTypeController::class, 'index'])->name('admin.product-type');
        

        // bill
        Route::get('/bill', [App\Http\Controllers\Admin\BillController::class, 'index'])->name('admin.bill.list');
       
        Route::get('/bill/detail/{id}', [App\Http\Controllers\Admin\BillController::class, 'show'])->name('admin.bill.detail');    
        
        Route::get('/bill/delete/{id}', [App\Http\Controllers\Admin\BillController::class, 'destroy'])->name('admin.bill.delete');

        // customer
        Route::get('/customer', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('admin.customer.list');
        Route::get('/customer/search', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('admin.customer.search');

        Route::get('/customer/edit/{slug}', [App\Http\Controllers\Admin\CustomerController::class, 'show'])->name('admin.customer.edit');
        Route::post('/customer/edit/{slug}', [App\Http\Controllers\Admin\CustomerController::class, 'edit'])->name('admin.customer.edit');

        Route::get('/customer/delete/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'destroy'])->name('admin.customer.delete');

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
