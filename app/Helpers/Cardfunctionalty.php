<?php
use Illuminate\Support\Arr;

if (!function_exists('cart_functionalty')) {
  /**
   * @param $searchValue
   * @param $item
   * @return int
   */
  function cart_functionalty($searchValue, $item): int
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
