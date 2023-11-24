<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Gallery\StoreGalleryRequest;

use App\Http\Requests\Admin\Gallery\UpdateGalleryRequest;
use App\Models\Admin\Gallery;
use File;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ResizeImage;

class GalleryController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.page.gallery.index')->with('gallery', Gallery::all());
    }

  /**
   * Show the form for creating a new resource.
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.page.gallery.create');
    }

  /**
   * Store a newly created resource in storage.
   * @param StoreGalleryRequest $request
   * @return RedirectResponse
   */
    public function store(StoreGalleryRequest $request): RedirectResponse
    {
        if ($request->hasFile('gallery_image') && $request->file('gallery_image')->isValid()) {
            $gallery_image = $request->file('gallery_image');
            $galleryImage = time() . '-' . $gallery_image->getClientOriginalName();
            $sitelogopath = public_path('storage/gallery');!is_dir($sitelogopath) && mkdir($sitelogopath, 0777, true);
            ResizeImage::make($request->file('gallery_image'))->save($sitelogopath . '/' . $galleryImage);
        }
        Gallery::insert(['name' => $request->image_title, 'image' => $galleryImage, 'image_postion' => (int) $request->image_postion, 'status' => ($request->status == '1') ? 1 : 0, 'created_at' => now(), 'updated_at' => now()]);
        notyf()->duration(2000)->addSuccess('Gallery Image Created Successfully.');
        return redirect()->route('admin.manage-gallery.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

  /**
   * Show the form for editing the specified resource.
   * @param string $id
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
    public function edit(string $id): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.page.gallery.edit')->with('gallery', Gallery::findOrFail($id));

    }

  /**
   * Update the specified resource in storage.
   * @param UpdateGalleryRequest $request
   * @param string $id
   * @param Gallery $gallery
   * @return RedirectResponse
   */
    public function update(UpdateGalleryRequest $request, string $id, Gallery $gallery): RedirectResponse
    {
        $Gallery = $gallery::findOrFail($id);
        if ($request->hasFile('gallery_image') && $request->file('gallery_image')->isValid()) {
            $image_pasth = public_path('storage/gallery');!is_dir($image_pasth) && mkdir($image_pasth, 0777, true);
            $gallery_image = $request->file('gallery_image');
            $galleryImage = time() . '-' . $gallery_image->getClientOriginalName();
            DeleteOldImage($image_pasth . '/' . $Gallery->image);
            ResizeImage::make($request->file('gallery_image'))->save($image_pasth . '/' . $galleryImage);
        } else {
            $galleryImage = $Gallery->image;
        }
        $gallery::findOrFail($id)->update(['name' => $request->image_title, 'image' => $galleryImage, 'image_postion' => (int) $request->image_postion, 'status' => ($request->status == '1') ? 1 : 0, 'updated_at' => now()]);
        notyf()->duration(2000)->addSuccess('Gallery  Image Update Successfully.');
        return redirect()->route('admin.manage-gallery.index');
    }

  /**
   * Remove the specified resource from storage.
   * @param string $id
   * @param Gallery $gallery
   * @return RedirectResponse
   */
    public function destroy(string $id, Gallery $gallery): RedirectResponse
    {
        $gallery::findOrFail($id)->delete();
        notyf()->duration(2000)->addSuccess('Gallery Image Deleted Successfully.');
        return redirect()->route('admin.manage-gallery.index');
    }

}
