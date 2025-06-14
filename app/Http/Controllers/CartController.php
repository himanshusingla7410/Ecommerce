<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Services\OrderService;



class CartController extends Controller
{

    public function index(OrderService $orderservice)
    {   
        
        $products = Cart::select('product_name', 'product_size', 'product_quantity', 'product_price', 'product_image')
            ->where('ip_address', request()->ip())
            ->get();

        $totalOrderValue = $orderservice->calculateOrderValue();

        return $products->isNotEmpty() ? view('cart.index', compact('products', 'totalOrderValue')) : view('cart.empty');
    }


    public function store()
    {

        request()->validate([

            'product_name' => 'bail|required|string|max:255|exists:products,product_name',
            'product_size' => 'required|string|in:XS,S,M,L,XL,XXL,3XL',
            'product_quantity' => 'required|integer|min:1|max:10',
            'product_price' => 'required|integer|min:0 ',
            'product_image' => 'required|url'

        ]);

        $item = Cart::where([
            'ip_address' => request()->ip(),
            'product_id' => Product::where('product_name', request('product_name'))->first()->id,
            'product_name' => request('product_name'),
            'product_size' => request('product_size'),
            'product_price' => request('product_price'),
        ])->first();


        if ($item) {
            $increaseQty = min($item->product_quantity + request('product_quantity'), 10);
            $item->update(['product_quantity' => $increaseQty]);
        } else {

            Cart::create([
                'ip_address' => request()->ip(),
                'product_id' => Product::where('product_name', request('product_name'))->first()->id,
                'product_name' => request('product_name'),
                'product_size' => request('product_size'),
                'product_quantity' => request('product_quantity'),
                'product_price' => request('product_price'),
                'product_image' => request('product_image'),
            ]);
        }


        $cartCount = Cart::where('ip_address', request()->ip())->count('product_id');

        return response()->json([
            'status' => 'success',
            'message' => 'Item added to cart !',
            'cartCount' => $cartCount
        ]);
    }

    public function destroy(OrderService $orderservice)
    {
        request()->validate([
            'product_name' => 'required|string|max:255',
            'product_size' => 'required | string | in:XS,S,M,L,XL,XXL,3XL'
        ]);

        Cart::where('ip_address', request()->ip())
            ->where('product_name', request('product_name'))
            ->where('product_size', request('product_size'))
            ->delete();


        $totalOrderValue = $orderservice->calculateOrderValue();

        $cartCount = Cart::where('ip_address', request()->ip())->count('product_id');

        $products = Cart::select('product_name', 'product_size', 'product_quantity', 'product_price', 'product_image')
            ->where('ip_address', request()->ip())
            ->distinct()
            ->get();

        if (route('cart.delete')) {
            return $products->isNotEmpty() ?  view('cart.index', compact('products', 'totalOrderValue')) : view('cart.empty');
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'Item removed from cart',
                'cartCount' => $cartCount
            ]);
        }
    }



    
}
