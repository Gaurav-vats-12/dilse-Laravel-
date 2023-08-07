<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\Blog\{StoreBannerRequest,UpdateBlogRequest};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Blog;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ResizeImage;
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
        if($request->hasFile(trim('blog_image'))){
            $blog_image = $request->file(trim('blog_image'));
            $blogImage = time().'-'.$blog_image->getClientOriginalName();
            $destinationPath = public_path('storage/blog/'); !is_dir($destinationPath) &&  mkdir($destinationPath, 0777, true);
            $img = ResizeImage::make($blog_image->path());
            ResizeImage::make($request->file('blog_image'))->save($destinationPath.'/'. $blogImage);
        }
        $slug = Str::slug($request->blog_title, '-').'-'.mt_rand(0,20);
        Blog::insert(['blog_title' => $request->blog_title, 'blog_image' => $blogImage,'slug' => $slug,'blog_content' => $request->blog_content,'blog_meta_title' => $request->blog_meta_title,'blog_meta_description' => $request->blog_meta_description,'status' => $request->status,'created_at' => now(), 'updated_at' => now() ]);
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
    public function update(UpdateBlogRequest $request, string $id)
    {
        $blog = Blog::findOrFail($id);
        if($request->hasFile(trim('blog_image'))){
            $destinationPath = public_path('storage/blog/'); !is_dir($destinationPath) &&  mkdir($destinationPath, 0777, true);
            DeleteOldImage($destinationPath.'/'.$blog->blog_image);
            $blog_image = $request->file(trim('blog_image'));
            $blogImage = time().'-'.$blog_image->getClientOriginalName();
            $img = ResizeImage::make($blog_image->path());
            ResizeImage::make($request->file('blog_image'))->save($destinationPath.'/'. $blogImage);
        }else{
            $blogImage = $blog->blog_image;
        }
        $slug = Str::slug($request->blog_title, '-').' '.\Str::random(4).'';

        Blog::findOrFail($id)->update(['blog_title' => $request->blog_title,'blog_image' => $blogImage, 'slug' =>$slug,'blog_content' => $request->blog_content,'blog_meta_title' => $request->blog_meta_title,'blog_meta_description' => $request->blog_meta_description,'status' => $request->status,'updated_at' => now() ]);
        return redirect()->route('admin.blog.index')->withSuccess('Blog  Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::findOrFail($id)->delete();
        return redirect()->route('admin.blog.index')->withSuccess('Blog Successfully Deleted');

    }

}
