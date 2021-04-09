<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Session;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.page.post.create')->withCategories($categories);
    }

    /**
     * uploadImage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadImage(Request $request)
    {
        $rules = array(
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('admin/post/create')
            ->withInput($request->input())
                ->withErrors($validator);
        } 
        else {
            dd('ttt');
        }
    
        // $imageName = time().'.'.$request->image->getClientOriginalExtension();  
        // $request->image->move(public_path('images'), $imageName);

     
        
        // $content=$request->content;
        // $dom = new \DomDocument();
        // $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        // $images = $dom->getElementsByTagName('img');

        // foreach($images as $k => $img){
        //     $data = $img->getAttribute('src');

        //     list($type, $data) = explode(';', $data);
        //     list(, $data)      = explode(',', $data);
        //     $data = base64_decode($data);

        //     $image_name= "/upload/" . time().$k.'.png';
        //     $path = public_path() . $image_name;
           
        //     file_put_contents($path, $data);
            
        //     $img->removeAttribute('src');
        //     $img->setAttribute('src', $image_name);
        // }

        // $dom->saveHTML();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        
        $post->title = $request->title;
      
        $post->description = $request->description;
   
        $post->category_id = $request->category_id;

        $userIdCurrent = Auth::guard('admin')->user()->id;
 
        $post->slug = str_slug($post->title , "-");

    
        dd($post->slug);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}