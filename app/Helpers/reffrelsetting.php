<?php

use App\Models\Admin\Setting\Referral;

if (!function_exists('reffrelsetting')) {

  /**
   * description
   *
   * @param $key
   * @return void
   */
    function reffrelsetting($key)
    {
        return !Referral::first() ? null : Referral::first()->$key;
    }
}
