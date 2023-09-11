<?php

if (!function_exists('getattribute')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function getattribute($attributes_type)
    {

        return App\Models\Admin\Attributes::where('attributes_type',$attributes_type)->where('status',1)->get();

    }
}
