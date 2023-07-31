<?php
use App\Models\{Country,State,City};

if (!function_exists('Countriesget')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function Countriesget()
    {
        $currency =  collect(Country::pluck('name', 'name'))->toArray();

     return $currency;

    }
}
