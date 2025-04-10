<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::select('name','price','images')->limit(4)->get();
        $products1 = Product::select('name','price','images')->limit(4)->offset(4)->get();

        return view('index.welcome', compact('products','products1'));
    }

    public static function view($name)
    {
        $product = Product::where('name', $name)->first();

        // dd($product->images[0]);
        return view('product.index', compact('product'));
    }


    public static function addToCart()
    {

        return 'ok';
    }

    public static function checkout() {}
}
