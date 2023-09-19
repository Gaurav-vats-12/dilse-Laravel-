<?php

use Jenssegers\Agent\Agent;

if (!function_exists('checkUser')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function checkUser(): string
    {
        $agent = new Agent;
        if ($agent->isDesktop()) {
            // The request is from a desktop device
            return 'desktop';
        } elseif ($agent->isMobile()) {
            // The request is from a mobile device
            return 'mobile';
        } else {
            // The request is from an unknown or other device type
            return 'other';
        }

    }
}
