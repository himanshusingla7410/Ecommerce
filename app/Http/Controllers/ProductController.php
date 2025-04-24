<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\OrderService;

class ProductController extends Controller
{

    public function welcome()
    {
        $products = Product::select('product_name', 'product_price', 'product_image')->limit(4)->get();
        $products1 = Product::select('product_name', 'product_price', 'product_image')->limit(4)->offset(4)->get();


        return view('welcome', compact('products', 'products1'));
        
    }

    public function index()
    {

        $products = Product::select('product_name', 'product_price', 'product_image')
            ->inRandomOrder()
            ->paginate(8);
        $count = Product::all()->count();



        return view('product.index', compact('products', 'count'));
    }


    public  function show($product_name, OrderService $orderservice)
    {
        $products = Product::where('product_name', $product_name)->get();
        $totalOrderValue = $orderservice->calculateOrderValue($products);

        return view('product.show', compact('products','totalOrderValue'));
    }
   
}
