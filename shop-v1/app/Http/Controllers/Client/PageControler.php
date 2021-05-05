<?php

namespace App\Http\Controllers\Client;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;

class PageControler extends Controller
{
    public function getIndex(){
        $slide = Slide::all(); // lấy db slide
        $new_product = Product::where('new',1)->get(); // lấy db New Products điều kiện column new=1
        
        // return view('client.index',['slide'=>$slide]); có 2 cách để return 
        return view('client.index',compact('slide', 'new_product'));
    }

    public function getProductType(){
        return view('client.page.product_type');
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
