<?php

use App\Models\Admin\Setting\Referral;

if (!function_exists('reffrelsetting')) {

    /**
     * description
     *
     * @return void
     */
    function reffrelsetting($key)
    {
        return (Referral::first()) ? Referral::first()->$key : null ;
    }
}
