<?php

namespace App\Models\Admin;

use App\Models\Order\OrderItems;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\ExtraFoodItems;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * @method static whereIn(string $string, array $productIds)
 * @method static create(array $array)
 * @method static where(string $string, $id)
 * @method static findOrFail($product_id)
 * @method static count()
 */
class FoodItem extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected array $dates = ['deleted_at'];


  /**
   * @return BelongsTo
   */
  public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

  /**
   * @return HasMany
   */
  public function ExtraFoodItems(): HasMany
    {
        return $this->hasMany(ExtraFoodItems::class, 'food_item_id', 'id');
    }

  /**
   * @return HasMany
   */
  public function attributes(): HasMany
    {
        return $this->hasMany(FoodAttribute::class);
    }


    /**
     * @return void
     */
    protected static function booted(): void
    {
        static::creating(function ($footItem) {
            $footItem->slug = self::createUniqueSlug($footItem->name);
        });
    }


    // Method to generate a unique slug from the given title

    /**
     * @param $title
     * @param $id
     * @return string
     */
    protected static function createUniqueSlug($title, $id = null): string
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

    /**
     * @return HasMany
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItems::class);
    }

}
