<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Support\Facades\Validator;
use File;

class SlideController extends Controller
{
    public function guard()
    {
        return Auth::guard('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::orderBy('id', 'DESC')->get();

        return view('admin.page.slide.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.slide.create');
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
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('admin/slide/create')
                ->withInput($request->input())
                ->withErrors($validator);
        } else {
            $slides = new Slide();
            if (isset($request->image)) {
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('assets/client/image/slide/'), $imageName);
                $slides->image = $imageName;
            }
            $slides->save();
            return redirect('admin/slide')->with(['flag' => 'success', 'class' => 'success', 'message' => "Successfully created product"]);
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
        $slides = Slide::find($id);
        $img_select = Slide::select('image')->where('id', $id)->first();
        $img = $img_select['image'];
        $image_path = "assets/client/image/slide//$img";
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $slides->delete();
        return redirect('admin/slide')->with(['flag' => 'success', 'class' => 'success', 'message' => "Successfully delete product"]);
    }
}
