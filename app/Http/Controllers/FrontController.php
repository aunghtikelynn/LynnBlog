<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class FrontController extends Controller
{
    public function blog()
    {
        $posts = Post::orderBy('id','DESC')->paginate(6);
        return view('front.blog',compact('posts'));
    }

    public function blogPost($id)
    {
        $post = Post::find($id);
        return view('front.blog-post',compact('post'));
    }
}
