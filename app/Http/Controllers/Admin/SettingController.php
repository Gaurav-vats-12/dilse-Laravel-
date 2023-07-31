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
            ResizeImage::make($request->file('logo'))->resize(1440, 674)->save($sitelogopath.'/'. $siteImage);
         }else{
            $siteImage = $setting_get->site_logo;
         }
         if($request->hasFile('Favicon') && $request->file('Favicon')->isValid()){
            $Favicon = $request->file('Favicon');
            $FaviconImage = time().'-'.$Favicon->getClientOriginalName();
            $Faviconpath = public_path('storage/site/Favicon'); !is_dir($Faviconpath) &&  mkdir($Faviconpath, 0777, true);
            ResizeImage::make($request->file('Favicon'))->resize(1440, 674)->save($Faviconpath.'/'. $FaviconImage);
         }else{
            $FaviconImage = $setting_get->Favicon;
         }
         Setting::findOrFail($id)->update(['site_title' => $request->site_title,'site_email' => $request->site_email,'phone' => $request->phone,'site_currency' => $request->site_currency,'site_location' =>($request->site_location) ? json_encode($request->site_location) : null , 'address' => $request->address,'copyright_text' => $request->copyright_text, 'facebook_url' => $request->facebook_url,'youtube_url' => $request->youtube_url,'linkedin_url' => $request->linkedin_url, 'instagram_url' => $request->instagram_url,'logo' =>$siteImage,'Favicon' =>$FaviconImage,'updated_at' => now()]);
         return redirect()->route('admin.setting.genral')->withSuccess('Site Setting  Updated');;

    }

}
