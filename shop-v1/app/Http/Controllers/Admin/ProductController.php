<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\Facades\Validator;
use File;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin']);
    }

    public function index(Request $request)
    {
        $obj = Product::orderBy('id', 'DESC');
        $search =  $request->query('search');
        if(!empty($search)){
            $products = $obj
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('unit_price', 'LIKE', "%{$search}%")
            ->orWhere('unit', 'LIKE', "%{$search}%")
            ->paginate(10)->appends(['search' => $request->search]);
        }
        else {
            $products = $obj->paginate(10);
        }
        
        return view('admin.page.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_type = ProductType::select('name', 'id')->get();
        return view('admin.page.product.create', compact('product_type'));
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
            'name'         => 'required|min:3|max:255',
            'id_type'    => 'required',
            'image'    => 'required',
            'unit_price'    => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('admin/product/create')
                ->withInput($request->input())
                ->withErrors($validator);
        } else {
            $products = new Product();
            $products->name = "$request->name";
            $products->description = ($request->description == NULL) ? '' : "$request->description";
            $products->id_type = $request->id_type;
            $products->unit_price = str_replace(',', '', $request->unit_price);
            $products->unit = "$request->unit";
            $products->new =  ($products->new == 0) ? '0' :  $request->new;

            if ($products->promotion_price == '') {
                $products->promotion_price = 0;
            } else {
                $products->promotion_price = str_replace(',', '', $request->promotion_price);
            }
            if (isset($request->image)) {
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('assets/client/image/product/'), $imageName);
                $products->image = $imageName;
            }

            $products->save();
            return redirect('admin/product')->with(['flag' => 'success', 'class' => 'success', 'message' => "Successfully created product"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_type = ProductType::select('name', 'id')->get();
        $products = Product::find($id);
        return view('admin.page.product.edit', compact('products', 'product_type'));
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
            'name'         => 'required|min:3|max:255',
            'id_type'    => 'required',
            'image'    => 'required',
            'unit_price'    => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('admin/product/create')
                ->withInput($request->input())
                ->withErrors($validator);
        } else {
            $products = Product::find($id);
            $products->name = $request->name;
            $products->description = $request->description;
            $products->id_type = $request->id_type;
            $products->unit_price = str_replace(',', '', $request->unit_price);
            $products->unit = $request->unit;
            if ($request->has('new')) {
                $products->new = 1;
            } else {
                $products->new = 0;
            }
            if (isset($request->image)) {
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('assets/client/image/product/'), $imageName);
                $products->image = $imageName;
            }
            $products->save();
        }

        return redirect('admin/product')->with(['flag' => 'success', 'class' => 'success', 'message' => "Successfully created product"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $img_select = Product::select('image')->where('id', $id)->first();
        $img = $img_select['image'];
        $image_path = "assets/client/image/product/$img";
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $products->delete();
        return redirect('admin/product')->with(['flag' => 'success', 'class' => 'success', 'message' => "Successfully delete product"]);
    }
}
