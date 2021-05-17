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
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{
    public function __construct() {
        $this->middleware(['admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $obj = Post::latest();
        $search =  $request->query('search');
        if(!empty($search)){
            $posts = $obj
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(5)->appends(['search' => $request->search]);
        }
        else {
            $posts = Post::latest()->paginate(5);
        }
        return view('admin.page.post.index', compact('posts'));
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
        // $rules = array(
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // );

        // $validator = Validator::make($request->all(), $rules);
        // if ($validator->fails()) {
        //     return redirect('admin/post/create')
        //     ->withInput($request->input())
        //         ->withErrors($validator);
        // } 
        // else {
        //     dd('ttt');
        // }
        
        // $imageName = time().'.'.$request->image->getClientOriginalExtension();        
        // $request->image->move(public_path('images'), $imageName);
    
        $content=$request->content;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);

            $image_name= "/upload/" . time().$k.'.png';
            $path = public_path() . $image_name;

           
            file_put_contents($path, $data);
            
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        // $dom->saveHTML();
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'title'         => 'required|min:3|max:255',
            'slug'          => 'required|min:3|max:255|unique:posts',
            // 'image'         => 'sometimes|image',
            // 'content'         => 'required',
            // 'category_id'   => 'required|numeric',
            // 'description'   => 'required|min:3'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('admin/post/create')
            ->withInput($request->input())
                ->withErrors($validator);
        } 
        else {
            $post = new Post();        
            $post->title = $request->title;
            $post->description = $request->description;
            $post->slug = $request->slug;
            $post->category_id = $request->category_id;
            $post->user_id = Auth::guard('admin')->user()->id;
            
            if(isset($request->image)){
                $imageName = time().'.'.$request->image->getClientOriginalExtension();        
                $request->image->move(public_path('images'), $imageName);
                $post->image = $imageName;
            }
            $post->content = $request->content;
            $post->save();
            Session::flash('message', 'Successfully created post!');
            return redirect(route('admin.post.list', [$post->slug]));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $slug,Post $post)
    {
        $post = Post::where('slug', $slug)->first();

        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.page.post.edit')
                ->withPost($post)
                ->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $slug)
    {
        $post = Post::where('slug', $slug)->first();

        $rules = array(
            'title'         => 'required|min:3|max:255',
            'slug'          => 'required|min:3|max:255',
        );
    
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return redirect('admin/post/edit/'.$slug)
            
            ->withInput($request->input())
                ->withErrors($validator);
        } 
        else {
            $post->title = $request->title;
            $post->description = $request->description;
            $post->slug = $request->slug;
            $post->category_id = $request->category_id;
            $post->user_id = Auth::guard('admin')->user()->id;
            
            if(isset($request->image)){
                $imageName = time().'.'.$request->image->getClientOriginalExtension();        
                $request->image->move(public_path('images'), $imageName);
                $post->image = $imageName;
            }
            $post->content = $request->content;
            $post->save();

            Session::flash('message', 'Successfully updated post!');
            return redirect(route('admin.post.list', [$post->slug]));
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
        $posts = Post::find($id);
        $posts->delete();
        Session::flash('message', 'Successfully deleted the post!');
        return redirect('admin/post/list');
    }
}