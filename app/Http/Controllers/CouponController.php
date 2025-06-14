<?php

namespace App\Http\Controllers;

use App\Services\CouponVisibilityService;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    
    public function __construct(
        private CouponVisibilityService $coupon){;}
    

    public function index( Request $request)
    {
        $orderValue= $request->query('orderValue');
        // dd($orderValue);

        $data= $this->coupon->getCoupons($orderValue);
        
        return response()->json([
            'status'=> 'success',
            'data' => $data
        ]);

    }

}
