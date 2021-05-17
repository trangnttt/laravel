<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Support\Facades\Validator;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productType = ProductType::all();
        return view('admin.page.productType.index', compact('productType'));
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
            'name'      => 'required|min:3|max:255|string',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('admin/product-type')
            ->withInput($request->input())
                ->withErrors($validator);
        } 
        else {
            $productType = new ProductType();
            $productType->name = "$request->name";
            $productType->save();
            return redirect('admin/product-type')->with(['flag' => 'success', 'class' => 'success', 'message' => "Successfully created product type"]);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'name'  => 'required|min:3|max:255|string'
        );
       
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return redirect('admin/product-type/edit/'.$id)
            
            ->withInput($request->input())
                ->withErrors($validator);
        } 
        else {
            $categories = ProductType::find($id);
            $categories->name = $request->name;
            $categories->save();
            return redirect('admin/product-type')->with(['flag' => 'success', 'class' => 'success', 'message' => "Successfully update product type"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productType = ProductType::find($id);
        $productType->delete();
        return redirect('admin/product-type')->with(['flag' => 'success', 'class' => 'success', 'message' => "Successfully delete product type"]);

    }
}
