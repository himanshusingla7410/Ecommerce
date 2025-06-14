<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function welcome()
    {
        $products = Product::select('product_name', 'product_price', 'product_image')->limit(4)->get();
        $products1 = Product::select('product_name', 'product_price', 'product_image')->limit(4)->offset(4)->get();
        $discountClaimed = false;
        
        return view('welcome', compact('products', 'products1','discountClaimed'));
        
    }

    public function index()
    {

        $products = Product::select('product_name', 'product_price', 'product_image')
            ->inRandomOrder()
            ->paginate(8);
        $count = Product::all()->count();

        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
        return view('product.index', compact('products', 'count'));
    }


    public  function show($product_name, OrderService $orderservice)
    {
        $products = Product::where('product_name', $product_name)->get();
        $totalOrderValue = $orderservice->calculateOrderValue($products);

        return view('product.show', compact('products','totalOrderValue'));
    }
   
}
