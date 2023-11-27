<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($billing_country)
 * @method static pluck(string $string, string $string1)
 */
class Country extends Model
{
    public $timestamps = true;

    use HasFactory;
}
