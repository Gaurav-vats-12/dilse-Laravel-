<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Testimonial\{StoreTestimonialRequest,UpdateTestimonialRequest};
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\{Testimonial};
use Intervention\Image\Facades\Image as ResizeImage;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete('Delete testimonial!',"Are you sure you want to delete?");
        $Testimonial = Testimonial::get();
        return view('admin.page.testimonial.index',compact('Testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.page.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestimonialRequest $request)
    {
        // dd($request->all());
        if($request->hasFile(trim('testonomailsImage'))){
            $banner_image = $request->file(trim('testonomailsImage'));
            $testonomailsImage = time().'-'.$banner_image->getClientOriginalName();
            $destinationPath = public_path('storage/testimonial/'); !is_dir($destinationPath) &&  mkdir($destinationPath, 0777, true);
            ResizeImage::make($request->file('testonomailsImage'))->resize(80, 80)->save($destinationPath.'/'. $testonomailsImage);
        }

        Testimonial::insertGetId(['custumber_name'=>$request->custumber_name,'testimonial_description'=>$request->testimonial_description,'testonomailsImage'=>$testonomailsImage,'rating'=>$request->rating,'status'=>$request->status,'created_at' => now(),'updated_at' => now() ]);
        return redirect()->route('admin.testimonial.index')->withSuccess('Testimonial Successfully Created');

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
     */
    public function edit(string $id)
    {
        $Testimonial = Testimonial::findOrFail($id);
        return view('admin.page.testimonial.edit',compact('Testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestimonialRequest $request, string $id)
    {
        $Testimonial = Testimonial::findOrFail($id);
        if($request->hasFile(trim('testonomailsImage'))){
            $banner_image = $request->file(trim('testonomailsImage'));
            $testonomailsImage = time().'-'.$banner_image->getClientOriginalName();
            $destinationPath = public_path('storage/testimonial/'); !is_dir($destinationPath) &&  mkdir($destinationPath, 0777, true);
            ResizeImage::make($request->file('testonomailsImage'))->resize(80, 80)->save($destinationPath.'/'. $testonomailsImage);
        }else{
            $testonomailsImage = $Testimonial->testonomailsImage;
        }
        Testimonial::findOrFail($id)->update(['custumber_name'=>$request->custumber_name,'testimonial_description'=>$request->testimonial_description,'testonomailsImage'=>$testonomailsImage,'rating'=>$request->rating,'status'=>$request->status,'updated_at' => now() ]);
        return redirect()->route('admin.testimonial.index')->withSuccess('Testimonial Successfully Updated');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Testimonial =  Testimonial::findOrFail($id)->delete();
        return redirect()->route('admin.testimonial.index')->withSuccess('Testimonial Successfully Deleted');

    }
}
