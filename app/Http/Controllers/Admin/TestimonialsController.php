<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\Testimonial\StoreTestimonialRequest;

use App\Http\Requests\Admin\Testimonial\UpdateTestimonialRequest;

use App\Models\Admin\Testimonial;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ResizeImage;

class TestimonialsController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return View|ApplicationAlias|Factory|Application
   */
    public function index(): View | ApplicationAlias | Factory | Application
    {
        $Testimonial = Testimonial::orderByDesc('id')->get();
        return view('admin.page.testimonial.index', compact('Testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     * @return View|ApplicationAlias|Factory|Application
     */
    public function create(): View | ApplicationAlias | Factory | Application
    {
        return view('admin.page.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreTestimonialRequest $request
     * @return RedirectResponse
     */
    public function store(StoreTestimonialRequest $request): RedirectResponse
    {
        if ($request->hasFile(trim('testonomailsImage'))) {
            $banner_image = $request->file(trim('testonomailsImage'));
            $testonomailsImage = time() . '-' . $banner_image->getClientOriginalName();
            $destinationPath = public_path('storage/testimonial/');!is_dir($destinationPath) && mkdir($destinationPath, 0777, true);
            ResizeImage::make($request->file('testonomailsImage'))->resize(80, 80)->save($destinationPath . '/' . $testonomailsImage);
        }

        Testimonial::insertGetId(['custumber_name' => $request->custumber_name,  'google_testonomails_link' => $request->google_testonomails_link,'testimonial_description' => $request->testimonial_description, 'testonomailsImage' => $testonomailsImage, 'rating' => $request->rating, 'status' => $request->status, 'created_at' => now(), 'updated_at' => now()]);
        notyf()->duration(duration: 2000)->addSuccess(message: 'Testimonial Created Successfully.');
        return redirect()->route(route: 'admin.testimonial.index');
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
   * @return View|ApplicationAlias|Factory|Application
   */
    public function edit(string $id): View|ApplicationAlias|Factory|Application
    {
        $Testimonial = Testimonial::findOrFail($id);
        return view('admin.page.testimonial.edit', compact('Testimonial'));
    }

  /**
   * Update the specified resource in storage.
   * @param UpdateTestimonialRequest $request
   * @param string $id
   * @return RedirectResponse
   */
    public function update(UpdateTestimonialRequest $request, string $id): RedirectResponse
    {
        $Testimonial = Testimonial::findOrFail($id);
        if ($request->hasFile(trim('testonomailsImage'))) {
            $destinationPath = public_path('storage/testimonial/');!is_dir($destinationPath) && mkdir($destinationPath, 0777, true);
            $banner_image = $request->file(trim('testonomailsImage'));
            $testonomailsImage = time() . '-' . $banner_image->getClientOriginalName();
            ResizeImage::make($request->file('testonomailsImage'))->resize(80, 80)->save($destinationPath . '/' . $testonomailsImage);
            DeleteOldImage($destinationPath . '/' . $Testimonial->testonomailsImage);
        } else {
            $testonomailsImage = $Testimonial->testonomailsImage;
        }
        Testimonial::findOrFail($id)->update(['custumber_name' => $request->custumber_name, 'testimonial_description' => $request->testimonial_description, 'testonomailsImage' => $testonomailsImage, 'rating' => $request->rating, 'status' => $request->status, 'updated_at' => now()]);
        notyf()->duration(2000)->addSuccess('Testimonial Updated Successfully.');
        return redirect()->route('admin.testimonial.index');

    }

  /**
   * Remove the specified resource from storage.
   * @param string $id
   * @return RedirectResponse
   */
    public function destroy(string $id): RedirectResponse
    {
        $Testimonial = Testimonial::findOrFail($id)->delete();
        notyf()->duration(2000)->addSuccess('Testimonial Deleted Successfully.');
        return redirect()->route('admin.testimonial.index');
    }
}
