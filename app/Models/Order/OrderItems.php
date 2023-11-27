<?php

namespace App\Models\Order;

use App\Models\Admin\FoodItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Stripe\Product;

/**
 * @method static insert(array $cart_datals)
 */
class OrderItems extends Model
{
    use HasFactory;
    protected $guarded = [];


  /**
   * @return BelongsTo
   */
  public function order(): BelongsTo
    {
        return $this->belongsTo(related: Order::class);
    }


  /**
   * @return BelongsTo
   */
  public function product(): BelongsTo
    {
        return $this->belongsTo(FoodItem::class);
    }

  /**
   * @return HasMany
   */
  public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItems::class);
    }

  /**
   * @return BelongsTo
   */
  public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
