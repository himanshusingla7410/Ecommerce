<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Request;

class ProductController extends Controller
{

    public function index()
    {
        
        $products = Product::select('name', 'price', 'images')->limit(4)->get();
        $products1 = Product::select('name', 'price', 'images')->limit(4)->offset(4)->get();

        return view('index.welcome', compact('products', 'products1'));
    }

    public  function show($name)
    {
        $product = Product::where('name', $name)->first();

        return view('product.index', compact('product'));
    }


    public  function store(Request $request)
    {
       
    }

    public  function checkout() {}
}
