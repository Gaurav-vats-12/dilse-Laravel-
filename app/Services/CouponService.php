<?php

namespace App\Services;
use App\Models\Admin\Coupon;
use Carbon\Carbon;

use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use App\Models\CouponHistory;
class CouponService
{
    public static function add($array)
    {
        return Coupon::insertGetId([
            "code" => $array["coupon_code"],
            "type" => $array["discount_type"],
            "user_id" => isset($array["user_id"]) ? $array["user_id"] : null,
            "user_email" => isset($array["user_email"])
                ? $array["user_email"]
                : null,
            "coupan_description" => $array["coupon_description"],
            "amount" => $array["discount_amount"],
            "minimum_spend" => isset($array["minimum_spend"])
                ? $array["minimum_spend"]
                : null,
            "maximum_spend" => isset($array["maximum_spend"])
                ? $array["maximum_spend"]
                : null,
            "coupon_type" => $array["coupon_type"],
            "start_date" => $array["start_date"],
            "end_date" => $array["end_date"],
            "use_limit" => isset($array["use_limit"])
                ? $array["use_limit"]
                : null,
            "same_ip_limit" => isset($array["use_same_ip_limit"])
                ? $array["use_same_ip_limit"]
                : null,
            "use_limit_per_user" => isset($array["user_limit"])
                ? $array["user_limit"]
                : null,
            "multiple_use" => isset($array["multiple_use"])
                ? $array["multiple_use"]
                : "no",
            "status" => isset($array["status"]) ? $array["status"] : 0,
            "created_at" => now(),
            "updated_at" => now(),
        ]);
    }
    public static function update($array, $id)
    {
        return Coupon::findOrFail($id)->update([
            "code" => $array["coupon_code"],
            "type" => $array["discount_type"],
            "user_id " => isset($array["user_id "]) ? $array["user_id"] : null,
            "user_email" => isset($array["user_email"])
                ? $array["user_email"]
                : null,
            "coupan_description" => $array["coupon_description"],
            "amount" => $array["discount_amount"],
            "minimum_spend" => isset($array["minimum_spend"])
                ? $array["minimum_spend"]
                : null,
            "maximum_spend" => isset($array["maximum_spend"])
                ? $array["maximum_spend"]
                : null,
            "coupon_type" => $array["coupon_type"],
            "start_date" => $array["start_date"],
            "end_date" => $array["end_date"],
            "use_limit" => isset($array["use_limit"])
                ? $array["use_limit"]
                : null,
            "same_ip_limit" => isset($array["use_same_ip_limit"])
                ? $array["use_same_ip_limit"]
                : null,
            "use_limit_per_user" => isset($array["user_limit"])
                ? $array["user_limit"]
                : null,
            "multiple_use" => isset($array["multiple_use"])
                ? $array["multiple_use"]
                : "no",
            "status" => isset($array["status"]) ? $array["status"] : 0,
            "updated_at" => now(),
        ]);
    }

    public static function remove($couponId)
    {
        $coupon = Coupon::findOrFail($couponId);
        if ($coupon) {
            CouponHistory::query()
                ->where("coupon_id", $couponId)
                ->delete();
            $coupon->delete();
        } else {
            throw new CouponException("Invalid coupon id");
        }
        return true;
    }

    public static function validity(
        $couponCode,
        float $amount,
        string $userId,
        string $deviceName = null,
        string $ipaddress = null,
        string $vendorId = null,
        array $skip = []
    ) {
        $coupon = Coupon::query()
            ->where("code", $couponCode)
            ->withCount([
                "couponHistories as user_use_coupon" => function ($q) use (
                    $userId
                ) {
                    $q->selectRaw("COUNT(*)")->where("user_id", $userId);
                },
            ])
            ->first();
        //01.Check if coupon exists

        if (!$coupon) {
            return response()->json(
                [
                    "code" => "error",
                    "message" => "Invalid coupon code!",
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
        //02. Check coupon status
        if ($coupon->status != 1) {
            return response()->json(
                [
                    "code" => "error",
                    "message" =>
                        "Coupon apply failed. This coupon is inactive.",
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        //03. Check coupon start date validity
        // dd(Carbon::today()->toDateTimeString());
        if ($coupon->start_date > Carbon::today()->toDateString()) {
            return response()->json(
                [
                    "code" => "error",
                    "message" =>
                        "Coupon apply failed! Invalid coupon code.",
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

            //04. Check coupon end date validity
            if ($coupon->end_date && $coupon->end_date < Carbon::today()->toDateString()) {
                return response()->json(
                    [
                        "code" => "error",
                        "message" =>
                            "Coupon apply failed! This coupon has expired.",
                    ],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );

            }
                 //05. check coupon per user use limitation
        if ($coupon->use_limit_per_user && $coupon->use_limit_per_user > 0) {
            $couponHistories = $coupon->couponHistories->where("user_id", $userId);
            if ($couponHistories && $couponHistories->count() >= $coupon->use_limit_per_user) {
                return response()->json(
                    [
                        "code" => "error",
                        "message" =>
                            "Coupon apply failed! You have overcome the usage limit.",
                    ],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }
        }

        //06. Check total coupon applied limitation
        if ($coupon->use_limit && $coupon->use_limit > 0) {
            if ($coupon->couponHistories->count() && $coupon->couponHistories->count() >= $coupon->use_limit) {
                return response()->json(
                    [
                        "code" => "error",
                        "message" =>
                            "The coupon apply failed! Because of overcoming the total usage limit",
                    ],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }
        }

        //07. Check minimum order amount to applied  this coupon
        if ($coupon->minimum_spend > 0 && $coupon->minimum_spend > $amount) {
            return response()->json(
                [
                    "code" => "error",
                    "message" =>
                        "Invalid Amount! To apply this coupon minimum {$coupon->minimum_spend} amount is required",
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );

        }

        //08. Check maximum order amount to applied  this coupon
        if ($coupon->maximum_spend > 0 && $coupon->maximum_spend < $amount) {
            return response()->json(
                [
                    "code" => "error",
                    "message" =>
                        "Invalid Amount! To apply this coupon maximum {$coupon->maximum_spend} amount is required",
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        // check coupon code using device
        if ($coupon->use_device && !in_array("device_name", $skip)) {
            if (empty($deviceName)) {
                return response()->json(
                    [
                        "code" => "error",
                        "message" =>
                            "Coupon apply failed! Not found any device name.",
                    ],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }

            if ($coupon->use_device != $deviceName) {
                return response()->json(
                    [
                        "code" => "error",
                        "message" =>
                            "Coupon apply failed! This coupon only apply to " . ucfirst($coupon->use_device)."",
                    ],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }
        }

        // check same ip restriction
        if ($coupon->same_ip_limit && $coupon->same_ip_limit > 0 && !in_array("ip_address", $skip)) {
            if (empty($ipaddress)) {
                return response()->json(
                    [
                        "code" => "error",
                        "message" =>
                            "Coupon apply failed! Not found any IP address",
                    ],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }

            if (!filter_var($ipaddress, FILTER_VALIDATE_IP)) {
                return response()->json(
                    [
                        "code" => "error",
                        "message" =>
                            "Invalid IP address!",
                    ],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }

            $couponHistories = $coupon->couponHistories->where("user_ip", $ipaddress);
            if ($couponHistories && $coupon->same_ip_limit <= $couponHistories->count()) {
                return response()->json(
                    [
                        "code" => "error",
                        "message" =>
                            "Sorry, there are lots of order happened from your ip location using this coupon, we are not accepting more orders from your ip location for this coupon!",
                    ],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }
        }

        // check vendor restriction
        if ($coupon->vendor_id && $coupon->vendor_id > 0 && !in_array("vendor_id", $skip)) {
            if (empty($vendorId)) {
                return response()->json(
                    [
                        "code" => "error",
                        "message" =>
                            "Coupon apply failed! Not found any vendor id",
                    ],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }

            if ($coupon->vendor_id != $vendorId) {
                return response()->json(
                    [
                        "code" => "error",
                        "message" =>
                            "Coupon apply failed! This coupon can not be applied for this shop.",
                    ],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }
        }

        // calculate discount amount
        $discount_amount = 0;
        if ($coupon->type == 'fixed') {
            $discount_amount += floatval($coupon->amount);
        } else {
            $discount_percentage = floatval($coupon->amount);
            $discount_amount     += ($discount_percentage / 100) * floatval($amount);
        }

        $coupon->discount_amount = $discount_amount;

        return $coupon;


    }
}

?>
