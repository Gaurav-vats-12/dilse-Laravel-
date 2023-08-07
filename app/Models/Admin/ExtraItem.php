<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'status'
    ];

    public function extraitems(){
        return $this->hasOne(FoodExtraItem::class,'extra_item_id');
    }

}
