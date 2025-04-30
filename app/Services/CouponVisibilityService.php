<?php

namespace App\Services;

use App\Models\Coupon;
use Illuminate\Support\Facades\Cache ;

class CouponVisibilityService
{

    public function getCoupons($orderValue)
    {   
        return  Cache::remember(
            "value_{$orderValue}",
            now()->addMinutes(1),
            function() use ($orderValue) {

                return Coupon::query()
                    ->where('is_active', 1)
                    ->whereDate('valid_from', '<=', now())
                    ->whereDate('valid_to', '>=', now())
                    ->where(function ($query) use ($orderValue){
                        $query->whereNull('min_amt')
                            ->orWhere('min_amt', '<=', $orderValue * 1.50); 
                    })
                    ->get()
                    ->map( function($coupon) use ($orderValue){
                        return $this->formatCoupon($coupon, $orderValue);
                    })  ;               
            }               
        );
    }

    private function formatCoupon(Coupon $coupon, float $orderValue) : array {

        $isCouponApplicable = $this->isApplicable($coupon, $orderValue);
        $missingAmount = $coupon->min_amt >= $orderValue ? $coupon->min_amt - $orderValue : 0 ;

        return [
            'code'=> $coupon->code,
            'description'=> $coupon->description,
            'applicable'=> $isCouponApplicable,
            'missingAmount'=> $missingAmount,
        ];
    }


    private function isApplicable($coupon, $orderValue) : bool{

        return !$coupon->min_amt || $orderValue >= $coupon->min_amt;

    }



}
