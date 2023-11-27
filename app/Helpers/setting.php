<?php

use App\Models\Admin\Setting\Setting;

if (!function_exists('setting')) {

    /**
     * description
     *
     * @param $key
     * @return null
     */
    function setting($key)
    {
        return !Setting::first() ? null : Setting::first()->$key;
    }
}
