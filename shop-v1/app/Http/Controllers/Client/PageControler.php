<?php

namespace App\Http\Controllers\Client;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;


class PageControler extends Controller
{
    public function getIndex(){
        $slide = Slide::all(); // lấy db slide
        $new_product = Product::where('new',1)->paginate(4); // lấy db New Products điều kiện column new=1
        $top_product = Product::where('promotion_price','<>',0)->paginate(8); // lấy db Top Products điều kiện column new=0

        // return view('client.index',['slide'=>$slide]); có 2 cách để return 
        return view('client.index',compact('slide', 'new_product', 'top_product'));
    }

    public function getProductType($type){
        $product_type = Product::where('id_type',$type)->get();
        $product_other = Product::where('id_type','<>',$type)->paginate(6); // lấy db Top Products điều kiện column new=0
        $types = ProductType::all();
        $type_item = ProductType::where('id',$type)->first();
        return view('client.page.product_type',compact('product_type', 'product_other', 'types', 'type_item'));
    }

    public function getProductDetail(){
        return view('client.page.product_detail');
    }

    public function getContact(){
        return view('client.page.contact');
    }

    public function getAbout(){
        return view('client.page.about');
    }
    
}
