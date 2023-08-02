<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\Setting\{UpdateGenralSettingRequst};
use App\Models\Admin\Setting\{Setting,Mail};
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ResizeImage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Controller;
use SoulDoit\SetEnv\Env;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function genralsetting(){

        return view('admin.setting.genralsetting');

    }

    public function updategenralSetting(UpdateGenralSettingRequst $request, string $id){


        $setting_get = Setting::findOrFail($id);
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            $site_logo = $request->file('logo');
            $siteImage = time().'-'.$site_logo->getClientOriginalName();
            $sitelogopath = public_path('storage/site/logo'); !is_dir($sitelogopath) &&  mkdir($sitelogopath, 0777, true);
            ResizeImage::make($request->file('logo'))->resize(90, 60)->save($sitelogopath.'/'. $siteImage);
         }else{
            $siteImage = $setting_get->site_logo;
         }
         if($request->hasFile('Favicon') && $request->file('Favicon')->isValid()){
            $Favicon = $request->file('Favicon');
            $FaviconImage = time().'-'.$Favicon->getClientOriginalName();
            $Faviconpath = public_path('storage/site/Favicon'); !is_dir($Faviconpath) &&  mkdir($Faviconpath, 0777, true);
            ResizeImage::make($request->file('Favicon'))->resize(90, 60)->save($Faviconpath.'/'. $FaviconImage);
         }else{
            $FaviconImage = $setting_get->favicon;
         }


        if($request->hasFile('footer_logo') && $request->file('footer_logo')->isValid()){
            $Favicon = $request->file('footer_logo');
            $footer_logoImage = time().'-'.$Favicon->getClientOriginalName();
            $footer_logopath = public_path('storage/site/logo'); !is_dir($footer_logopath) &&  mkdir($footer_logopath, 0777, true);
            ResizeImage::make($request->file('footer_logo'))->resize(390, 250)->save($footer_logopath.'/'. $footer_logoImage);
        }else{
            $footer_logoImage = $setting_get->footer_logo;
         }

         if($request->hasFile('footer_image_2')){  $imageslist=[];
            $footer_image_2path = public_path('storage/site/footer/otherImage'); !is_dir($footer_image_2path) &&  mkdir($footer_image_2path, 0777, true);
            foreach($request->file('footer_image_2') as $file)  {

                $footer_image_2Image = time().'-'.$file->getClientOriginalName();
                ResizeImage::make($file)->resize(45, 45)->save($footer_image_2path.'/'. $footer_image_2Image);
             $imageslist[] = $footer_image_2Image;

        }  $footer_image_2 = implode(',', $imageslist);}
        else{
              $footer_image_2  = $setting_get->footer_image_2;
              }

         Setting::findOrFail($id)->update(['site_title' => $request->site_title,'site_email' => $request->site_email,'phone' => $request->phone,'site_currency' => $request->site_currency,'site_location' =>($request->site_location) ? implode(',', $request->site_location) : null , 'address' => $request->address,'copyright_text' => $request->copyright_text, 'facebook_url' => $request->facebook_url,'twitter_url' => $request->twitter_url,'blogto_url' => $request->blogto_url,'opening_hour' => $request->opening_hour, 'instagram_url' => $request->instagram_url,'logo' =>$siteImage,'footer_logo' =>$footer_logoImage,'favicon' =>$FaviconImage,'footer_image_2' =>$footer_image_2,'updated_at' => now()]);
         return redirect()->route('admin.setting.genral')->withSuccess('Site Setting  Updated');;
    }

    public function footersetting(){

    }

}
