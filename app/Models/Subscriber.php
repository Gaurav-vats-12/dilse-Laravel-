<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @method static findOrFail($id)
 * @method static where(string $string, mixed $input)
 * @method static insertGetId(array $array)
 */
class Subscriber extends Model
{
    use HasFactory;
    protected $guarded = [];
}
