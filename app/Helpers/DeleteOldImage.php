<?php

if (!function_exists('DeleteOldImage')) {

  /**
   * description
   *
   * @param
   * @return bool
   */
    function DeleteOldImage( $imagePath): bool
    {
        if(\File::exists($imagePath)) { \File::delete($imagePath); return true;  }  return false;

    }
}
