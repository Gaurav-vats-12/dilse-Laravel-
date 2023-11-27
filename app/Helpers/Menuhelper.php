<?php

use App\Models\Admin\Menu as MenuAlias;

if (!function_exists('Menuhelper')) {

  /**
   * @return mixed
   */
  function Menuhelper( ): mixed
  {
        return  MenuAlias::where('status','active')->get();
    }
}
