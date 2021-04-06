<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Session;


class MemberController extends Controller
{
    
    public function create() {
        return view('admin.page.member.create');
    }

    public function store(Request $request) {

        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email|unique:admins',
            'password' => 'required|min:6'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('admin/member/create')
            ->withInput($request->input())
                ->withErrors($validator);
        } 
        else {
            $Admin = new Admin;
            $Admin->name = $request->name;
            $Admin->email = $request->email;
            $Admin->password = bcrypt($request->password);
            $Admin->save();
            Session::flash('message', 'Successfully created member!');
            return redirect('admin/member');
        }
    }

    public function edit($id) {
        $data = Admin::find($id);
        return view('admin.page.member.edit', compact('data'));
    }

    public function update($id, Request $request) {
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email|unique:admins,email,'.$id,
            'password' => 'required|min:6'
        );
       
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return redirect('admin/member/edit/'.$id)
            
            ->withInput($request->input())
                ->withErrors($validator);
        } 
        else {
            $Admin = Admin::find($id);
            $Admin->name = $request->name;
            $Admin->email = $request->email;
            $Admin->password = bcrypt($request->password);
            $Admin->save();
            Session::flash('message', 'Successfully updated member!');
            return redirect('admin/member');
        }
    }

    public function destroy($id)
    {
        $Admin = Admin::find($id);
        $Admin->delete();
        Session::flash('message', 'Successfully deleted the member!');
        return redirect('admin/member');
    }

    public function search(Request $request){
        
        $search =  $request->input('query');
        $obj = new Admin;

        $data = $obj
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->paginate(5);

        return view('admin.page.member.index', compact('data'));
    }

    public function index(Request $request)
    {
        $userIdCurrent = Auth::guard('admin')->user()->id;
        $obj = new Admin;
        $search =  $request->query('search');
        
        if(!empty($search)) {
            $data = $obj
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->paginate(5)->appends(['search' => $request->search]);
        }

        else {
            $data = $obj->where('id', '<>', $userIdCurrent)
            ->paginate(5);
           
        }
        return view('admin.page.member.index', compact('data'));
      
    }

}
