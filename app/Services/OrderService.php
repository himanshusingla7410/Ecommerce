<?php


namespace App\Services;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class OrderService
{

    public function calculateOrderValue($products = null)
    {
        if (is_null($products)) {
            $items = Cart::select('product_name', 'product_size', 'product_quantity', 'product_price', 'product_image')
                ->where('ip_address', request()->ip())
                ->distinct()
                ->get();


            return $items->sum(function ($item) {
                return $item->product_price * $item->product_quantity;
            });
        }

        $collection = collect($products);
        return $collection->sum('product_price');
    }



    public function createOrder( int $amt = 0,  $couponCode = "", string $address = "")
    {

        Order::create([
            'user_id' => User::where('id', Auth::id())->first()->id,
            'order_number' => date('ymd') . (string) random_int(100, 999),
            'address_id' => Address::where('address', $address)->first()->id,
            'status' => 'processed',
            'payment_status' => 'processing',
            'total_amount' => (string) $amt,
            'coupon_id' => $couponCode ? Coupon::where('code', $couponCode)->first()->id : 0,
        ]);

        $orderNumber = Order::where('user_id',Auth::id())->latest()->first()->order_number;

       return $orderNumber;
    }

    public function update($orderNumber)
    {
        $orderDetails = Order::where('order_number', $orderNumber)->first();

        $orderDetails->payment_status = "Completed";

        $orderDetails->save();
    }

    public function getDetails($orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)->first();
        $address = Address::where('id', $order->address_id)->first();
        
        return [
            'orderNumber' => $order->order_number,
            'mobileNumber' => $address->mobile_number,
            'receiverName' => implode(' ', array_filter([$address->first_name, $address->last_name])), 
            'address' => implode(' ', array_filter([$address->address, $address->city, $address->state])),
            'amount' => $order->total_amount,
            'paymentStatus' => $order->payment_status,
        ];
    }
}
