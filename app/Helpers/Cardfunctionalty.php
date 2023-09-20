<?php
use Illuminate\Support\Arr;

if (!function_exists('cart_functionalty')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function cart_functionalty($searchValue,$item)
    {
        $nonSpicyItemCount = 0;
        foreach ($item as $item) {
            if ($item["is_spisy"] === "false") {
                $nonSpicyItemCount++;
            }
        }
        return $nonSpicyItemCount;
    }
}
