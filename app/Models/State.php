<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, mixed $country_uid)
 * @method static findOrFail($billing_state)
 */
class State extends Model
{
    use HasFactory;
    public $timestamps = true;

}
