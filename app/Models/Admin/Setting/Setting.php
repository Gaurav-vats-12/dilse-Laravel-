<?php

namespace App\Models\Admin\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(string $id)
 * @method static create(array $array)
 * @method static first()
 */
class Setting extends Model
{
    use HasFactory;
    protected $guarded = [];
}
