<?php
use App\Models\{Country,State,City};

if (!function_exists('Countriesget')) {

  /**
   * description
   *
   * @return array
   */
    function Countriesget(): array
    {
      return collect(Country::pluck('name', 'name'))->toArray();

    }
}
