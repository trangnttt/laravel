<?php

namespace App\Http\Controllers\Client;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        view()->share('product_type', ProductType::all());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('client.auth.login');
    }

    /**
     * Post a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {   
        $rules = array(
            'email'      => 'required|email',
            'password' => 'required|min:6|max:20',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('client.signin')
            ->withInput($request->input())
                ->withErrors($validator);
        } 
        else {
            $credentials = array(
                'email'=> $request->email,
                'password'=> $request->password,
            );
            if(Auth::attempt(($credentials))){
                return redirect()->route('client.home');
            }
            else{
                return redirect()->back()->with(['flag'=>'error','class'=>'danger','message'=>"Fail Login. Please check your email or password!!!"]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'email'      => 'required|email|unique:users',
            'password' => 'required|min:6|max:20',
            'full_name'       => 'required',
            're_password'       => 'required|same:password',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('client.signup')
            ->withInput($request->input())
                ->withErrors($validator);
        } 
        else {
            $user = new User();
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();
            return redirect()->route('client.signin')->with(['flag'=>'success','class'=>'success','message'=>"Successfully create account. Please login"]);

        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('client.home');
    }

}
