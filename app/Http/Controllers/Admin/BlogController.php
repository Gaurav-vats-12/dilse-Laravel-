<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\Blog\StoreBannerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Blog;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::all();
        confirmDelete('Delete Blog!',"Are you sure you want to delete?");

        return view('admin.page.blog.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        Blog::insert(['blog_title' => $request->blog_title, 'blog_slug' => $request->blog_slug,'blog_content' => $request->blog_content,'blog_meta_title' => $request->blog_meta_title,'blog_meta_description' => $request->blog_meta_description,'status' => $request->status,'created_at' => now(), 'updated_at' => now() ]);
        return redirect()->route('admin.blog.index')->withSuccess('Blog  Successfully Created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.page.blog.view',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.page.blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBannerRequest $request, string $id)
    {
        Blog::findOrFail($id)->update(['blog_title' => $request->blog_title, 'blog_slug' => $request->blog_slug,'blog_content' => $request->blog_content,'blog_meta_title' => $request->blog_meta_title,'blog_meta_description' => $request->blog_meta_description,'status' => $request->status,'updated_at' => now() ]);
        return redirect()->route('admin.blog.index')->withSuccess('Blog  Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::findOrFail($id)->delete();
        return redirect()->route('admin.blog.index')->withSuccess('Blog  Successfully Deleted');

    }
}
