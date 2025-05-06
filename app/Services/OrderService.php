<?php


namespace App\Services;

use App\Models\Cart;



class OrderService
{

    public function calculateOrderValue($products=null)
    {
        if (is_null($products)) {
            $items = Cart::select('product_name', 'product_size', 'product_quantity', 'product_price', 'product_image')
                ->where('ip_address', request()->ip())
                ->distinct()
                ->get(); 

            // dd($items);

            return $items->sum( function($item) {
                return $item->product_price * $item->product_quantity;    
            });
        }

        $collection = collect($products);
        return $collection->sum('product_price');
    }
}
