<?php

namespace App\Models;
use App\Models\Admin\Coupon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponHistory extends Model
{
    use HasFactory;


    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public static function paginate(int $limit = 10, int $page = 1)
    {
        return self::paginate($limit, "*", "page", $page);
    }



}
