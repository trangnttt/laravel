<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ProductType;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // lấy dữ liệu cho product_type trên menu
        view()->composer('client/partial/header',function($view){
            $product_type = ProductType::all();
            $view->with('product_type',$product_type);
        });
    }
}
