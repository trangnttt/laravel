<?php

namespace App\Http\Controllers\Client;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class PageControler extends Controller
{
    public function __construct()
    {
        view()->share('product_type', ProductType::all());
    }

    public function getIndex(Request $request)
    {
        $slide = Slide::orderBy('id', 'desc')->take(4)->get();// lấy db slide
        $new_product = Product::where('new', 1)->paginate(4); // lấy db New Products điều kiện column new=1
        $top_product = Product::where('promotion_price', '<>', 0)->paginate(8); // lấy db Top Products điều kiện column new=0
        $product_type = ProductType::all(); //menu sub product

        // return view('client.index',['slide'=>$slide]); có 2 cách để return
        return view('client.index', compact('slide', 'new_product', 'top_product', 'product_type'));
    }

    public function getProductType($type)
    {
        $product_type = Product::where('id_type', $type)->get();
        $product_other = Product::where('id_type', '<>', $type)->paginate(6); // lấy db Top Products điều kiện column new=0
        $types = ProductType::all();
        $type_item = ProductType::where('id', $type)->first();
        return view('client.page.product_type', compact('product_type', 'product_other', 'types', 'type_item'));
    }

    public function getProductDetail(Request $req)
    {
        $product = Product::where('id', $req->id)->first();
        $same_product = Product::where('id_type', $product->id_type)->paginate(6);
        return view('client.page.product_detail', compact('product', 'same_product'));
    }

    public function getContact()
    {
        return view('client.page.contact');
    }

    public function getAbout()
    {
        return view('client.page.about');
    }

    public function getAddtoCart(Request $req)
    {
        // $req->session()->forget('cart');

        // return 'ttt';
        $arrProduct = [];
        $qty = 1;
        $total = $req->total;
        
        if ($req->session()->has('cart')) {
            $arrProduct = Session::get('cart');
        }

        if (array_key_exists($req->id, $arrProduct)) {
            $qty = $arrProduct[$req->id]['qty'] + 1;
            $total += $total;
        }

        $arrProduct[$req->id] = [
            'id' => $req->id,
            'name' => $req->name,
            'image' => $req->image,
            'unit_price' => $req->unit_price,
            'promotion_price' => $req->promotion_price,
            'total' => $total,
            'qty' => $qty,
        ];
        Session::put("cart", $arrProduct);
        return response()->json(['status' => 'OK', 'data' => Session::get('cart')]);
    }
    
    public function getUpdateCart(Request $req)
    {
        $arrProduct = [];
        $qty = $req->qty;
        $total = $req->total;
        
        if ($req->session()->has('cart')) {
            $arrProduct = Session::get('cart');
        }

        if (array_key_exists($req->id, $arrProduct)) {
            $total += $total;
        }

        $arrProduct[$req->id] = [
            'id' => $req->id,
            'name' => $req->name,
            'image' => $req->image,
            'unit_price' => $req->unit_price,
            'promotion_price' => $req->promotion_price,
            'total' => $total,
            'qty' => $qty,
        ];
        Session::put("cart", $arrProduct);
        return response()->json(['status' => 'OK', 'data' => Session::get('cart')]);
    }
    public function deletetoCart(Request $req)
    {

        $arr = Session::get('cart');
        unset($arr[$req->id]);
        Session::put("cart", $arr);

        return response()->json(['status' => 'OK', 'data' => Session::get('cart')]);
    }

    public function getOrder()
    {
        return view('client.page.order');
    }

    public function postOrder(Request $req)
    {
        $carts = Session::get('cart');
        $result = array();
        foreach ($carts as $key => $val) {
            $result[] = $val['total'];
        }
        array_sum($result);
        $totalPrice = array_sum($result);

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone_number;
        $customer->note = $req->note;
        $customer->save();


        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $totalPrice;
        $bill->payment = $req->payment;
        $bill->note = $req->note;
        $bill->save();

        foreach ($carts as $key => $val) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $val['qty'];
            $bill_detail->unit_price =  $val['unit_price'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with(['flag'=>'success','class'=>'success','message'=>"Successfully order"]);

    }
  
    public function getSearch(Request $req){
        $product = Product::where('name', 'like', '%'.$req->key.'%')
        ->orWhere('unit_price',$req->search)
        ->get();
        return view('client.page.search', compact('product'));
    }
} 
