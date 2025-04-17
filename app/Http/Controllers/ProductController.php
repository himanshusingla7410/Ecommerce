<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{

    public function welcome()
    {
        $products = Product::select('name', 'price', 'images')->limit(4)->get();
        $products1 = Product::select('name', 'price', 'images')->limit(4)->offset(4)->get();

        return view('welcome', compact('products', 'products1'));
    }

    public function index()
    {

        $products =Product::all(['name', 'price','images']);

        // dd($products);





        return view('product.index', compact('products'));
    }


    public  function show($name)
    {
        $product = Product::where('name', $name)->first();

        return view('product.show', compact('product'));
    }
}
