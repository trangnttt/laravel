<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/home';

    public function guard()
    {
        return Auth::guard('admin');
    }

    public function index()
    {
        return view('admin.home');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function adminLogin(Request $request)
    {
        $rules = array(
            'email'      => 'required|email',
            'password' => 'required|min:6'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('admin/login')
            ->withInput($request->input())
                ->withErrors($validator);
        } 

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            $request->session()->regenerate();
        
            return redirect()->intended('/admin');
        }

        else {
            return back()->
            withInput($request->input()) ->
            withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }
}
