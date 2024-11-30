<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function blog()
    {
        return view('front.blog');
    }

    public function blogPost($id)
    {
        return view('front.blog-post');
    }
}
