<?php

namespace App\Http\Controllers;

use App\Models\Admin\Blog;

class BlogController extends Controller
{
    public function blog()
    {
        $blog = Blog::where('status', 'published')->get();
        return view('Pages.Blog.blog', compact('blog'));
    }

    public function blogdetails(string $slug)
    {

        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('Pages.Blog.singleblogdetails', compact('blog'));
    }
}
