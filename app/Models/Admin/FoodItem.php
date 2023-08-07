<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodItem extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];


    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
