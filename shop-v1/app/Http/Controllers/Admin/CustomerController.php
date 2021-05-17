<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function __construct() {
        $this->middleware(['admin']);
    }
 
    public function index(Request $request)
    {
        $obj = new Customer;
        $search =  $request->query('search');
        if(!empty($search)){
            $customers = $obj
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orWhere('phone_number', 'LIKE', "%{$search}%")
            ->paginate(5)->appends(['search' => $request->search]);
        }
        else{
            $customers = $obj->paginate(5);
        }
        return view('admin.page.customer.index', compact('customers'));
    }

    public function show($id)
    {
        $customers = Customer::find($id);
        return view('admin.page.customer.edit', compact('customers'));

    }

    public function edit($id, Request $request)
    {
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email|unique:admins,email,'.$id,
            'address'       => 'required',
            'phone_number' => 'required|digits:10',
        );
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return redirect('admin/customer/edit/'.$id)
            
            ->withInput($request->input())
                ->withErrors($validator);
        } 
        else {
            $customers = Customer::find($id);
            $customers->name = $request->name;
            $customers->email = $request->email;
            $customers->gender = $request->gender;
            $customers->address = $request->address;
            $customers->phone_number = $request->phone_number;
            if(!empty( $request->note )){
                $customers->note = $request->note;
            }
            else{
                $customers->note = '';
            }
            $customers->save();
            return redirect('admin/customer')->with(['flag'=>'success','class'=>'success','message'=>"Successfully updated customer"]);

        }
    }

    public function destroy($id)
    {
        $customers = Customer::find($id);
        $customers->delete();
        return redirect()->route('admin.customer.list')->with(['flag'=>'success','class'=>'success','message'=>"Successfully deleted customer"]);

    }
}
