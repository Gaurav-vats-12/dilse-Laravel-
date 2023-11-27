<?php

namespace App\Services;
use App\Models\Admin\Coupon;
use Carbon\Carbon;
use App\Models\CouponHistory;
class CouponService
{
  /**
   * @param $array
   * @return mixed
   */
  public static function add($array): mixed
  {
        return Coupon::insertGetId([
            "code" => $array["coupon_code"],
            "type" => $array["discount_type"],
            "user_id" => $array["user_id"] ?? null,
            "parant_coupon_id" => $array["parant_coupon_id"] ?? null,
            "user_email" => $array["user_email"] ?? null,
            "coupan_description" => $array["coupon_description"],
            "amount" => $array["discount_amount"],
            "minimum_spend" => $array["minimum_spend"] ?? null,
            "maximum_spend" => $array["maximum_spend"] ?? null,
            "coupon_type" => $array["coupon_type"],
            "start_date" => $array["start_date"],
            "end_date" => $array["end_date"],
            "use_limit" => $array["use_limit"] ?? null,
            "same_ip_limit" => $array["use_same_ip_limit"] ?? null,
            "use_limit_per_user" => $array["user_limit"] ?? null,
            "vendor_id" => $array["vendor_id"] ?? null,
            "multiple_use" => $array["multiple_use"] ?? "no",
            "status" => $array["status"] ?? 0,
            "created_at" => now(),
            "updated_at" => now(),
        ]);
    }

  /**
   * @param $array
   * @param $id
   * @return mixed
   */
  public static function update($array, $id): mixed
  {
        return Coupon::findOrFail($id)->update([
            "code" => $array["coupon_code"],
            "type" => $array["discount_type"],
            "user_id " => isset($array["user_id "]) ? $array["user_id"] : null,
            "user_email" => $array["user_email"] ?? null,
            "parant_coupon_id" => $array["parant_coupon_id"] ?? null,
            "coupan_description" => $array["coupon_description"],
            "amount" => $array["discount_amount"],
            "minimum_spend" => $array["minimum_spend"] ?? null,
            "maximum_spend" => $array["maximum_spend"] ?? null,
            "coupon_type" => $array["coupon_type"],
            "start_date" => $array["start_date"],
            "vendor_id" => $array["vendor_id"] ?? null,
            "end_date" => $array["end_date"],
            "use_limit" => $array["use_limit"] ?? null,
            "same_ip_limit" => $array["use_same_ip_limit"] ?? null,
            "use_limit_per_user" => $array["user_limit"] ?? null,
            "multiple_use" => $array["multiple_use"] ?? "no",
            "status" => $array["status"] ?? 0,
            "updated_at" => now(),
        ]);
    }

  /**
   * @param $couponId
   * @return bool
   */
  public static function remove($couponId): bool
    {
        $coupon = Coupon::findOrFail($couponId);
      if (isset($coupon)) {
        if ($coupon) {
            CouponHistory::query()
                ->where("coupon_id", $couponId)
                ->delete();
            $coupon->delete();
        }
      }
      return true;
    }

    /**
     * @param $couponCode
     * @param float $amount
     * @param string $userId
     * @param string|null $deviceName
     * @param string|null $ipaddress
     * @param string|null $vendorId
     * @param array $skip
     * @return array
     */
    public static function validity($couponCode, float $amount, string $userId, string $deviceName = null, string $ipaddress = null, string $vendorId = null, array $skip = []): array
    {

        $coupon = Coupon::query()->where("code", $couponCode)->withCount(["couponHistories as user_use_coupon" => function ($q) use ($userId) {$q->selectRaw("COUNT(*)")->where("user_id", $userId);},])->first();
        if (!$coupon) {
            return
                [
                    "status" => "error",
                    "message" => "Invalid coupon code!",
                ];

        }
        if ($coupon->user_id == $userId) {
            return
            [
                "status" => "error",
                "message" =>
                    "This Promotional Code This isn't for you because it's a referral voucher. ",
            ];
        }
        //02. Check coupon status
        if ($coupon->status != 1) {
            return
                [
                    "status" => "error",
                    "message" =>
                        "Coupon apply failed. This coupon is inactive.",
                ];
        }



        //03. Check coupon start date validity
        if ($coupon->start_date > Carbon::today()->toDateString()) {
            return
                [
                    "status" => "error",
                    "message" =>
                        "Coupon apply failed! Invalid coupon code.",
                ];
        }

            //04. Check coupon end date validity
            if ($coupon->end_date && $coupon->end_date < Carbon::today()->toDateString()) {
                return
                    [
                        "status" => "error",
                        "message" =>
                            "Coupon apply failed! This coupon has expired.",
                    ];

            }
                 //05. check coupon per user use limitation
        if ($coupon->use_limit_per_user && $coupon->use_limit_per_user > 0) {
            $couponHistories = $coupon->couponHistories->where("user_id", $userId);
            if ($couponHistories && $couponHistories->count() >= $coupon->use_limit_per_user) {
                return
                    [
                        "status" => "error",
                        "message" =>
                            "Coupon apply failed! You have overcome the usage limit.",
                    ];
            }
        }

        //06. Check total coupon applied limitation
        if ($coupon->use_limit && $coupon->use_limit > 0) {
            if ($coupon->couponHistories->count() && $coupon->couponHistories->count() >= $coupon->use_limit) {
                return
                    [
                        "status" => "error",
                        "message" =>
                            "The coupon apply failed! Because of overcoming the total usage limit",
                    ];
            }
        }

        //07. Check minimum order amount to apply  this coupon
        if ($coupon->minimum_spend > 0 && $coupon->minimum_spend > $amount) {
          return
            array(
              "status" => "error",
              "message" => "Invalid Amount! To apply this coupon minimum {$coupon->minimum_spend} amount is required",
            );
        }

        //08. Check maximum order amount to apply  this coupon
        if ($coupon->maximum_spend > 0 && $coupon->maximum_spend < $amount) {
            return
                [
                    "status" => "error",
                    "message" => "Invalid Amount! To apply this coupon maximum {$coupon->maximum_spend} amount is required",
                ];
        }
        // check coupon code using device
        if ($coupon->use_device && !in_array("device_name", $skip)) {
            if (empty($deviceName)) {
                return
                    [
                        "status" => "error",
                        "message" =>
                            "Coupon apply failed! Not found any device name.",
                    ];
            }
            if ($coupon->use_device != $deviceName) {
                return
                    [
                        "status" => "error",
                        "message" =>
                            "Coupon apply failed! This coupon only apply to " . ucfirst($coupon->use_device)."",
                    ];
            }
        }
        // check same ip restriction
        if ($coupon->same_ip_limit && $coupon->same_ip_limit > 0 && !in_array("ip_address", $skip)) {
            if (empty($ipaddress)) {
                return
                    [
                        "status" => "error",
                        "message" =>
                            "Coupon apply failed! Not found any IP address",
                    ];
            }
            if (!filter_var($ipaddress, FILTER_VALIDATE_IP)) {
                return
                    [
                        "status" => "error",
                        "message" =>
                            "Invalid IP address!",
                    ];
            }

         $couponHistories = $coupon->couponHistories->where("user_ip", $ipaddress);
            if ($couponHistories && $coupon->same_ip_limit <= $couponHistories->count()) {
                return
                    [
                        "status" => "error",
                        "message" =>
                            "Sorry, there are lots of order happened from your ip location using this coupon, we are not accepting more orders from your ip location for this coupon!",
                    ];
            }
        }
        // check vendor restriction
        if ($coupon->vendor_id && $coupon->vendor_id > 0 && !in_array("vendor_id", $skip)) {
            if (empty($vendorId)) {
                return
                    [
                        "status" => "error",
                        "message" =>
                            "Coupon apply failed! this coupon not for you",
                    ];
            }
            if ($coupon->vendor_id != $vendorId) {
                return
                    [
                        "status" => "error",
                        "message" =>
                            "Coupon apply failed! This coupon can not be applied for this shop.",
                    ];
            }
        }
        // calculate discount amount
        $discount_amount = 0;
        if ($coupon->type == 'fixed_cart') {
            $discount_amount += floatval($coupon->amount);
        } else {
            $discount_percentage = floatval($coupon->amount);
            $discount_amount     += ($discount_percentage / 100) * floatval($amount);
        }
        $coupon->discount_amount = $discount_amount;
        return
            ["status" => "success",
                "message" => "",
                'coupon'=> $coupon
            ];
    }

  /**
   * @param array $data
   * @return bool
   */
  public static  function apply(array $data): bool
    {
         CouponHistory::create( $data);
        $coupon            = Coupon::query()->find($data["coupon_id"]);
        $coupon->total_use = $coupon->total_use + 1;
        $coupon->save();
        return true;
    }
}
