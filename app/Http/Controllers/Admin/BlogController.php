<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
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
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $blog = Blog::orderBy('id', 'DESC')->get();
        return view('admin.page.blog.index',compact('blog'));
    }

  /**
   * Show the form for creating a new resource.
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.page.blog.create');
    }

  /**
   * Store a newly created resource in storage.
   * @param StoreBannerRequest $request
   * @return RedirectResponse
   */
    public function store(StoreBannerRequest $request): RedirectResponse
    {
        $author = Auth::guard('admin')->check() ? Auth::guard('admin')->user()->name : '';
        if($request->hasFile(trim('blog_image'))){
            $blog_image = $request->file(trim('blog_image'));
            $blogImage = time().'-'.$blog_image->getClientOriginalName();
            $destinationPath = public_path('storage/blog/'); !is_dir($destinationPath) &&  mkdir($destinationPath, 0777, true);
            $img = ResizeImage::make($blog_image->path());
            ResizeImage::make($request->file('blog_image'))->save($destinationPath.'/'. $blogImage);
        }
        $slug = Str::slug($request->blog_title, '-').'-'.mt_rand(0,20);
        Blog::insert(['blog_title' => $request->blog_title, 'blog_image' => $blogImage,'slug' => $slug,'blog_content' => $request->blog_content,'blog_meta_title' => $request->blog_meta_title,'blog_meta_description' => $request->blog_meta_description,'author' => $author,'status' => $request->status,'created_at' => now(), 'updated_at' => now() ]);
        notyf()->duration(2000) ->addSuccess('Blog Created Successfully.');
        return redirect()->route('admin.blog.index');

    }

  /**
   * Display the specified resource.
   * @param string $id
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
    public function show(string $id): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $blog = Blog::findOrFail($id);
        return view('admin.page.blog.view',compact('blog'));
    }

  /**
   * Show the form for editing the specified resource.
   * @param string $id
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
    public function edit(string $id): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $blog = Blog::findOrFail($id);
        return view('admin.page.blog.edit',compact('blog'));
    }

  /**
   * Update the specified resource in storage.
   * @param UpdateBlogRequest $request
   * @param string $id
   * @return RedirectResponse
   */
    public function update(UpdateBlogRequest $request, string $id): RedirectResponse
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
        notyf()->duration(2000) ->addSuccess('Blog Updated Successfully.');
        return redirect()->route('admin.blog.index');
    }

  /**
   * Remove the specified resource from storage.
   * @param string $id
   * @return RedirectResponse
   */
    public function destroy(string $id): RedirectResponse
    {
        Blog::findOrFail($id)->delete();
        notyf()->duration(2000) ->addSuccess('Blog Deleted Successfully.');
        return redirect()->route('admin.blog.index');
    }


}
