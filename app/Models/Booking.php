<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $bookingData)
 * @method static count()
 */
class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];
}
