<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;

class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin']);
    }
    
    public function index(Request $req)
    {
        $obj = new Bill();
        $search =  $req->query('search');
        if(!empty($search)){
            $bills = $obj
            ->where('date_order', 'LIKE', "%{$search}%")
            ->paginate(5)->appends(['search' => $req->search]);
        }
        else {
            $bills = $obj->paginate(5);
        }
        return view('admin.page.bill.index', compact('bills'));
    }

    public function show($id)
    {
        $obj = new BillDetail();
        $billDetails =  $obj->where('id_bill', '=', "$id");

        $bills = $billDetails->paginate(5);
        return view('admin.page.bill.detail', compact('bills'));
    }

    public function destroy($id)
    {
        $bills = Bill::find($id);

        $obj = new BillDetail();

        $billDetails =  $obj->where('id_bill', '=', "$id");

        $bills->delete();
        $billDetails->delete();
        return redirect()->route('admin.bill.list')->with(['flag'=>'success','class'=>'success','message'=>"Successfully deleted bill"]);

    }
}
