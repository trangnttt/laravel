<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Admin;
use App\Models\Category;

class DashboadController extends Controller
{
    public function __construct() {
        $this->middleware(['admin']);
    }
    //
    public function count() {
        $objPost = new Post;
        $countPost = $objPost->count();
        $objAdmin = new Admin;
        $countAdmin = $objAdmin->count();
        $objCategory = new Category;
        $countCategory = $objCategory->count();
        return view('admin.home', compact('countPost', 'countAdmin', 'countCategory'));
    }
}
