<?php

namespace App\Models\Order;

use App\Models\Admin\FoodItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static insert(array $cart_datals)
 */
class OrderItems extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function order(): BelongsTo
    {
        return $this->belongsTo(related: Order::class);
    }


    public function product()
    {
        return $this->belongsTo(FoodItem::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
