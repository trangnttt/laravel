<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
        // $a = $this->validate($request, [
        //     'email'   => 'required|email',
        //     'password' => 'required|min:6'
        // ]);
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|password',
        ]);
        if ($validator->fails()) {
            return redirect('admin/login')
                        ->withErrors($validator)
                        ->withInput();
            // return view('admin.auth.login');
        }
       
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
   
            return redirect('/admin');
        }   

        // if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

        //     return redirect()->intended('/admin');
        // }
        return back()->withInput($request->only('email', 'remember'));

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
