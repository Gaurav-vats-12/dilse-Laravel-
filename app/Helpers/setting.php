<?php

if (!function_exists('setting')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function setting($key)
    {
        $setting = \App\Models\Admin\Setting\Setting::first();
        return ($setting) ? $setting->$key : null ;
    }
}
