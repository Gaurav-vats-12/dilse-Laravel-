<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static findOrFail(string $id)
 * @method static find(mixed $menu_uid)
 * @method static orderByDesc(string $string)
 * @method static where(string $string, string $string1)
 * @method static pluck(string $string, string $string1)
 * @method static insert(array $array)
 */
class Menu extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected array $dates = ['deleted_at'];

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(FoodItem::class);
    }
}
