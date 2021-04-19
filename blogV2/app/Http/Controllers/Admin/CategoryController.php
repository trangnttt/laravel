<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware(['admin']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('admin.page.category.index')->with([
          'categories'  => $categories
        ]);
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
            'parent_id' => 'sometimes|nullable|numeric'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('admin/category')
            ->withInput($request->input())
                ->withErrors($validator);
        } 
        else {
            $category = new Category;
            $category->name = $request->name;
            $category->parent_id = $request->parent_id;
            $category->save();
            Session::flash('message', 'Successfully created category!');
            return redirect('admin/category');
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
            return redirect('admin/category/edit/'.$id)
            
            ->withInput($request->input())
                ->withErrors($validator);
        } 
        else {
            $categories = Category::find($id);
            $categories->name = $request->name;
            $categories->save();
            Session::flash('message', 'Successfully updated member!');
            return redirect('admin/category');
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
        $categories = Category::find($id);
        $categories->delete();
        Session::flash('message', 'Successfully deleted the member!');
        return redirect('admin/category');
    }
}