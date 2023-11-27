<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, int $int)
 * @method static create(array $array)
 * @method static findOrFail($id)
 */
class ExtraItem extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected array $dates = ['deleted_at'];

  /**
   * @return HasOne
   */
  public function extraitems(): HasOne
    {
        return $this->hasOne(FoodExtraItem::class,'extra_item_id');
    }

}
