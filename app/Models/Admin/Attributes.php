<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $array)
 * @method static findOrFail(string $id)
 * @method static where(string $string, string $string1)
 * @method static insert(array[] $attribute)
 * @method static orderByDesc(string $string)
 */
class Attributes extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected array $dates = ['deleted_at'];
}
