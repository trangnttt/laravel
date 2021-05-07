<?php

namespace App\Http\Controllers\Client;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Contracts\Session\Session;


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

    public function getProductDetail(Request $req){
        $product = Product::where('id', $req->id)->first();
        $same_product = Product::where('id_type', $product->id_type)->paginate(6);
        return view('client.page.product_detail',compact('product', 'same_product'));
    }

    public function getContact(){
        return view('client.page.contact');
    }

    public function getAbout(){
        return view('client.page.about');
    }

    public function getAddCart($id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        
        return view('client.page.about');
    }
    
}
