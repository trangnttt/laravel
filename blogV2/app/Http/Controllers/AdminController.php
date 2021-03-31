<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Session;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/admin/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        // $this->middleware('guest:admin')->except('logout');
    }

    public function guard()
    {
        return Auth::guard('admin');
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

    public function logout(Request $request)
    {
        Auth::guard('admin') -> logout();
        return redirect('admin/login');
    }

    public function createMember() {
        return view('admin.page.member.add');
    }

    public function storeMember(Request $request) {

        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email|unique:admins',
            'password' => 'required|min:6'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('admin/member/add')
            ->withInput($request->input())
                ->withErrors($validator);
        } 
        else {
            $Admin = new Admin;
            $Admin->name = $request->name;
            $Admin->email = $request->email;
            $Admin->password = $request->password;
            $Admin->save();
            Session::flash('message', 'Successfully created member!');
            return redirect('admin/member/add');
        }

        
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }
}