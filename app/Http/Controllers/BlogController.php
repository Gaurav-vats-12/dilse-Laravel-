<?php

namespace App\Http\Controllers;
use App\Models\Admin\Blog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class BlogController extends Controller
{
    /**
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function blog(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $blog = Blog::where('status', 'published')->get();
        return view('Pages.Blog.blog', compact('blog'));
    }
  /**
   * @param string $slug
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
  public function blogdetails(string $slug): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('Pages.Blog.singleblogdetails', compact('blog'));
    }
}
