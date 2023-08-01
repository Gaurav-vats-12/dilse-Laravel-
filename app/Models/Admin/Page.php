<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Page extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];
}
