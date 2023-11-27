<?php

use Jenssegers\Agent\Agent;

if (!function_exists('checkUser')) {

  /**
   * description
   *
   * @return string
   */
    function checkUser(): string
    {
        $agent = new Agent;
        if ($agent->isDesktop()) {
            return 'desktop';
        } elseif ($agent->isMobile()) {
            return 'mobile';
        } else {
            return 'other';
        }

    }
}
