<?php

namespace App\Models\Admin;

use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CouponHistory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @method static findOrFail($id)
 * @method static find(mixed $coupon_uuid)
 */
class Coupon extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];



        /**
     * coupon validity
     */
    public function getValidityAttribute()
    {
        if ($this->attributes['end_date']) {
            if ($this->attributes['end_date'] < Carbon::today()->toDateTimeString()) {
                return "Expired";
            } else {
                return "Continue";
            }
        } else {
            return "Unlimited";
        }
    }


        /**
     * Has many relation between coupon_histories table
     *
     * @return HasMany
     */
    public function couponHistories(): HasMany
    {
        return $this->hasMany(CouponHistory::class, "coupon_id", "id");
    }

    public static function paginate(int $limit = 10, int $page = 1): mixed
    {
        return self::paginate($limit, "*", "page", $page);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class);
    }
}
