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
 * @method static where(string $string, int|string|null $user_id)
 * @method static insertGetId(array $array)
 */
class Coupon extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected array $dates = ['deleted_at'];


  /**
   * coupon validity
   * @return string
   */
    public function getValidityAttribute(): string
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

  /**
   * @param int $limit
   * @param int $page
   * @return mixed
   */
  public static function paginate(int $limit = 10, int $page = 1): mixed
    {
        return self::paginate($limit, "*", "page", $page);
    }

  /**
   * @return BelongsTo
   */
  public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class);
    }
}
