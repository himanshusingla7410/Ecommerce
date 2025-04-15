<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Cache\Events\RetrievingKey;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function store()
    {

        request()->validate([

            'product_name' => 'bail | required | string | max:255',
            'product_size' => 'required | string | in:XS,S,M,L,XL,XXL,3XL',
            'product_quantity' => 'required | integer | min:1',
            'product_price' => 'required | integer | min:0',
            'product_image' => 'required | url'

        ]);


        Cart::create([
            'ip_address' => request()->ip(),
            'product_id'=> Product::where('name', request('product_name'))->first()->id,
            'product_name' => request('product_name'),
            'product_size' => request('product_size'),
            'product_quantity' => request('product_quantity'),
            'product_price' => request('product_price'),
            'product_image' => request('product_image'),
        ]);

        
        return response()->json([
            'status'=> 'success',
            'message'=> 'Item added to cart !'
        ]);     

    }   

    public function destroy()
    {

        request()->validate([
            'product_name' => 'required|string|max:255'
        ]);

        Cart::where('ip_address', request()->ip())
            ->where('product_name', request('product_name'))
            ->delete();

        return response()->json([
            'status'=> 'success',
            'message'=> 'Item removed from cart'
        ]);


    }



}
