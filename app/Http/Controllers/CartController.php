<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{

    public function index()
    {
        $items = Cart::select('product_name', 'product_size', 'product_quantity', 'product_price', 'product_image')
            ->where('ip_address', request()->ip())
            ->distinct()
            ->get();

        return $items->isNotEmpty() ? view('cart.index', compact('items')) : view('cart.empty');
    }


    public function store()
    {

        request()->validate([

            'product_name' => 'bail | required | string | max:255',
            'product_size' => 'required | string | in:XS,S,M,L,XL,XXL,3XL',
            'product_quantity' => 'required | integer | min:1',
            'product_price' => 'required | integer | min:0',
            'product_image' => 'required | url'

        ]);


        $item = Cart::firstOrNew([
            'ip_address' => request()->ip(),
            'product_id' => Product::where('name', request('product_name'))->first()->id,
            'product_name' => request('product_name'),
            'product_size' => request('product_size'),
            'product_price' => request('product_price'),
            'product_image' => request('product_image'),
        ]);

        $item->product_quantity = $item->exists ? $item->product_quantity + 1 : 1;
        $item->save();
        $cartCount = Cart::where('ip_address', request()->ip())->distinct('product_id')->count('product_id');

        return response()->json([
            'status' => 'success',
            'message' => 'Item added to cart !',
            'cartCount' => $cartCount
        ]);
    }

    public function destroy()
    {
        request()->validate([
            'product_name' => 'required|string|max:255',
            'product_size' => 'required | string | in:XS,S,M,L,XL,XXL,3XL'
        ]);

        Cart::where('ip_address', request()->ip())
            ->where('product_name', request('product_name'))
            ->where('product_size', request('product_size'))
            ->delete();

        $cartCount = Cart::where('ip_address', request()->ip())->distinct('product_id')->count('product_id');
        $items = Cart::select('product_name', 'product_size', 'product_quantity', 'product_price', 'product_image')
            ->where('ip_address', request()->ip())
            ->distinct()
            ->get();
        
        if ( route('cart.delete')){
            return $items->isNotEmpty() ?  view('cart.index',compact('items')) : view('cart.empty');
        }else{
            return response()->json([
                'status' => 'success',
                'message' => 'Item removed from cart',
                'cartCount' => $cartCount
            ]);
        }
        
    }
}
