<?php

if (!function_exists('getattribute')) {


  /**
   * @param $attributes_type
   * @return mixed
   */
  function getattribute($attributes_type): mixed
  {

        return App\Models\Admin\Attributes::where('attributes_type',$attributes_type)->where('status',1)->get();

    }
}
