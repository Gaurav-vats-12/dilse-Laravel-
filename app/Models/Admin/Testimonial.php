<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static sortDesc()
 * @method static insertGetId(array $array)
 * @method static findOrFail(string $id)
 * @method static orderByDesc(string $string)
 * @method static where(string $string, string $string1)
 */
class Testimonial extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected array $dates = ['deleted_at'];
}
