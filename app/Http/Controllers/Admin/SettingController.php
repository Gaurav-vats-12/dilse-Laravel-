<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\Setting\UpdateGenralSettingRequst;

use App\Models\Admin\Setting\Setting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Facades\Image as ResizeImage;

class SettingController extends Controller
{
  /**
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
  public function genralsetting(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.page.setting.genralsetting');

    }

    /**
     * @param UpdateGenralSettingRequst $request
     * @param string $id
     */
    public function unregenerateSetting(UpdateGenralSettingRequst $request, string $id)
    {
        $setting_get = Setting::findOrFail($id);
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $site_logo = $request->file('logo');
            $siteImage = time() . '-' . $site_logo->getClientOriginalName();
            $sitelogopath = public_path('storage/site/logo');!is_dir($sitelogopath) && mkdir($sitelogopath, 0777, true);
            ResizeImage::make($request->file('logo'))->save($sitelogopath . '/' . $siteImage);
            DeleteOldImage($sitelogopath . '/' . $setting_get->site_logo);
        } else {
            $siteImage = $setting_get->site_logo;
        }
        if ($request->hasFile('Favicon') && $request->file('Favicon')->isValid()) {
            $Favicon = $request->file('Favicon');
            $FaviconImage = time() . '-' . $Favicon->getClientOriginalName();
            $Faviconpath = public_path('storage/site/Favicon');!is_dir($Faviconpath) && mkdir($Faviconpath, 0777, true);
            ResizeImage::make($request->file('Favicon'))->save($Faviconpath . '/' . $FaviconImage);
            DeleteOldImage($Faviconpath . '/' . $setting_get->favicon);
        } else {
            $FaviconImage = $setting_get->favicon;
        }
        if ($request->hasFile('footer_logo') && $request->file('footer_logo')->isValid()) {
            $Favicon = $request->file('footer_logo');
            $footer_logoImage = time() . '-' . $Favicon->getClientOriginalName();
            $footer_logopath = public_path('storage/site/logo');!is_dir($footer_logopath) && mkdir($footer_logopath, 0777, true);
            ResizeImage::make($request->file('footer_logo'))->resize(390, 250)->save($footer_logopath . '/' . $footer_logoImage);
            DeleteOldImage($footer_logopath . '/' . $setting_get->footer_logo);
        } else {
            $footer_logoImage = $setting_get->footer_logo;
        }
        if ($request->hasFile('footer_image_2')) {$imageslist = [];
            $footer_image_2path = public_path('storage/site/footer/otherImage');!is_dir($footer_image_2path) && mkdir($footer_image_2path, 0777, true);
            foreach ($request->file('footer_image_2') as $file) {
                $footer_image_2Image = time() . '-' . $file->getClientOriginalName();
                ResizeImage::make($file)->save($footer_image_2path . '/' . $footer_image_2Image);
                $imageslist[] = $footer_image_2Image;
                DeleteOldImage($footer_image_2path . '/' . $file);

            }$footer_image_2 = implode(',', $imageslist);} else {
            $footer_image_2 = $setting_get->footer_image_2;
        }
        Setting::findOrFail($id)->update(['site_title' => $request->site_title,
            'site_email' => $request->site_email,
            'phone' => $request->phone,
            'site_currency' => $request->site_currency,
            'site_location' => ($request->site_location) ? implode(',', $request->site_location) : null,
            'address' => $request->address,
            'copyright_text' => $request->copyright_text,
            'facebook_url' => $request->facebook_url,
            'twitter_url' => $request->twitter_url,
            'blogto_url' => $request->blogto_url,
            'minimum_order_for_delivery' => $request->minimum_order_for_delivery,
            'delivery_charge_within_5km' => $request->delivery_charge_within_5km,
            'delivery_charge_outside_5km' => $request->delivery_charge_outside_5km,
            'referrel_points_on_signup' => $request->referrel_points_on_signup,
            'tax' => $request->tax,
            'opening_hour' => $request->opening_hour,
            'instagram_url' => $request->instagram_url,
            'logo' => $siteImage,
            'footer_logo' => $footer_logoImage,
            'favicon' => $FaviconImage,
            'footer_image_2' => $footer_image_2,
            'updated_at' => now()]);
        notyf()->duration(2000)->addSuccess('Site Setting  Updated');
        return redirect()->route('admin.setting.genral');
    }

}
