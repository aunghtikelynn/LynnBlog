<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class FrontController extends Controller
{
    public function blog()
    {
        $feature_posts = Post::orderBy('id','DESC')->limit(1)->first();
        
        $posts = Post::where('id', '!=',$feature_posts->id)->orderBy('id','DESC')->paginate(8);
        return view('front.blog',compact('posts','feature_posts'));
    }

    public function blogPost($id)
    {
    
        $post = Post::find($id);
        return view('front.blog-post',compact('post'));
    }

    public function blogCategory($category_id){
        $posts = Post::where('category_id',$category_id)->orderBy('id','DESC')->paginate(8);
        return view('front.blog-category',compact('posts'));
    }
}
