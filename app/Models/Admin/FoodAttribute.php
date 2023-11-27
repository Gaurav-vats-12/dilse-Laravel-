<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $array)
 * @method static insert(array $newItems)
 */
class FoodAttribute extends Model
{
    protected $guarded = [];
    use HasFactory;

  /**
   * @return BelongsTo
   */
  public function product(): BelongsTo
    {
        return $this->belongsTo(FoodItem::class);
    }
}
