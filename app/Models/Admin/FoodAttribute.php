<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static insert(array $newItems)
 */
class FoodAttribute extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(FoodItem::class);
    }
}
