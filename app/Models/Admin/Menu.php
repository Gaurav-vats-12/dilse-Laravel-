<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static findOrFail(string $id)
 */
class Menu extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];
}
