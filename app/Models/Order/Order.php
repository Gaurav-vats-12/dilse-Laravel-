<?php

namespace App\Models\Order;

use App\Models\Admin\FoodItem;
use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo as BelongsToAlias;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $checkout_value)
 * @method static findOrFail(int $order_id)
 * @method static where(string $string, int|string|null $user_id)
 * @method static orderByDesc(string $string)
 * @method static count()
 * @method static insertGetId(array $array)
 */
class Order extends Model
{
    use HasFactory;
    protected $guarded = [];



    /**
     * @return BelongsToAlias
     */
    public function user(): BelongsToAlias
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */


    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItems::class);
    }


    /**
     * @return HasOne
     */
    public function payment(): HasOne
    {
        return $this->hasOne(Payments::class);
    }

    /**
     * @return HasOne
     */
    public function fetchPaymentDetails($status): HasOne
    {
        return "ASdsadsa";
//        return $this->hasOne(Payments::class)->where('payment_status', $status);
    }

}
