<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\Banner\{StoreBannerRequest,UpdateBannerRequest};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ResizeImage;
use App\Models\Admin\{Banner};
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::get();
        $title = 'Delete Banner!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
       return view('admin.banner.index',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        // if($request->hasFile(trim('banner_image'))){
        //     $banner_image = $request->file(trim('banner_image'));
        //     $bannerImage = time().'-'.$banner_image->getClientOriginalName();
        //     $destinationPath = public_path('storage/banner/'); !is_dir($destinationPath) &&  mkdir($destinationPath, 0777, true);
        //     $img = ResizeImage::make($banner_image->path());
        //     ResizeImage::make($request->file('banner_image'))->resize(1440, 674)->save($destinationPath.'/'. $bannerImage);
        // }
        if ($request->banner_type =='home') { $banner_details1 = $request->home_banner_button_url; $banner_details2 = $request->home_banner_button_name; } else if($request->banner_type =='popup') { $banner_details1 = $request->popup_banner_button_url;  $banner_details2 = $request->popup_banner_button_name;}else if($request->banner_type =='promo') {$banner_details1 = $request->promo_banner_button_url; $banner_details2 = $request->promo_banner_button_name; }else{ $banner_details1 = $request->banner_sales_start_date; $banner_details2 = $request->banner_sales_end_date; }
        Banner::insertGetId(['banneruuid'=>\Str::random(10), 'banner_title' => $request->banner_title,'banner_heading' => $request->banner_heading, 'banner_discription' => strip_tags($request->banner_discription),'bannerImage' =>null, 'banner_type' => $request->banner_type,'status' => $request->status,'banner_details1'=>$banner_details1,'banner_details2'=>$banner_details2,'created_at' => now(),'updated_at' => now()]);
        return redirect()->route('admin.banner.index')->withSuccess('Banner Successfully Created');
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
        $Banner = Banner::findOrFail($id);
        return view('admin.banner.edit' ,compact('Banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, string $id)
    {
        // $Banner = Banner::findOrFail($id);
        // if($request->hasFile(trim('banner_image'))){
        //     $banner_image = $request->file(trim('banner_image'));
        //     $bannerImage = time().'-'.$banner_image->getClientOriginalName();
        //     $destinationPath = public_path('storage/banner/'); !is_dir($destinationPath) &&  mkdir($destinationPath, 0777, true);
        //     $img = ResizeImage::make($banner_image->path());
        //     ResizeImage::make($request->file('banner_image'))->resize(1440, 674)->save($destinationPath.'/'. $bannerImage);
        // }else{
        //     $bannerImage =  $Banner->bannerImage;
        // }
        $bannerImage = null;
        if ($request->banner_type =='home') { $banner_details1 = $request->home_banner_button_url; $banner_details2 = $request->home_banner_button_name; } else if($request->banner_type =='popup') { $banner_details1 = $request->popup_banner_button_url;  $banner_details2 = $request->popup_banner_button_name;}else if($request->banner_type =='promo') {$banner_details1 = $request->promo_banner_button_url; $banner_details2 = $request->promo_banner_button_name; }else{ $banner_details1 = $request->banner_sales_start_date; $banner_details2 = $request->banner_sales_end_date; };
        $bjkkjk = ['banner_title' => $request->banner_title,'banner_heading' => $request->banner_heading, 'banner_discription' => strip_tags($request->banner_discription),'bannerImage' =>$bannerImage, 'banner_type' => $request->banner_type,'status' => $request->status,'banner_details1'=>$banner_details1,'banner_details2'=>$banner_details2,'updated_at' => now()];
        Banner::findOrFail($id)->update($bjkkjk);
            return redirect()->route('admin.banner.index')->withSuccess('Banner Successfully Updated');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner =  Banner::findOrFail($id);
        $banner->delete();
        return redirect()->route('admin.banner.index')->withSuccess('Banner Successfully Deleted');;

    }


    public function updateStatus(string $id ){
        dd('sadsa');

    }
}
