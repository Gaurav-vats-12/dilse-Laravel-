<?php

namespace App\Models;
use App\Models\Admin\Coupon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static insert(array $data)
 * @method static create(array $data)
 */
class CouponHistory extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
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



}
