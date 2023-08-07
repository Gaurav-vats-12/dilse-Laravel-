<?php

if (!function_exists('DeleteOldImage')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function DeleteOldImage( $imagePath)
    {
        if(\File::exists($imagePath)) { \File::delete($imagePath); return true;  }  return false;

    }
}
