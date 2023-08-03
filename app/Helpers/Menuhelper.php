<?php

if (!function_exists('Menuhelper')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function Menuhelper( )
    {

        return  \App\Models\Admin\Menu::where('status','active')->get();

    }
}
