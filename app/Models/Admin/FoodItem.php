<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\ExtraFoodItems;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class FoodItem extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];


    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    public function ExtraFoodItems(){
        return $this->hasMany(ExtraFoodItems::class, 'food_item_id', 'id');
    }


    protected static function booted()
    {
        static::creating(function ($footItem) {
            $footItem->slug = self::createUniqueSlug($footItem->name);
        });
    }

    // Method to generate a unique slug from the given title
    protected static function createUniqueSlug($title, $id = null)
    {
        $slug = Str::slug($title);

        // Check if a record with the same slug exists (excluding the current model if updating)
        $query = static::where('slug', $slug);
        if ($id !== null) {
            $query->where('id', '!=', $id);
        }

        $count = $query->count();

        // If a record with the same slug exists, append a unique suffix
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        return $slug;
    }



}
