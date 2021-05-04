<?php

namespace App\Http\Controllers\Client;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;



class PageControler extends Controller
{
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
