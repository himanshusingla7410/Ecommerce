<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\OrderService;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function welcome()
    {
        $products = Product::select('product_name', 'product_price', 'product_image')->limit(4)->get();
        $products1 = Product::select('product_name', 'product_price', 'product_image')->limit(4)->offset(4)->get();
        $discountClaimed = false;

        return view('welcome', compact('products', 'products1', 'discountClaimed'));
    }

    public function index()
    {

        $products = Product::select('product_name', 'product_price', 'product_image')
            ->inRandomOrder()
            // ->paginate(8);
            ->get();
        $count = Product::all()->count();
        // dd($products);
        // Auth::logout();
        // request()->session()->invalidate();
        // request()->session()->regenerateToken();
        // return redirect('/');
        return view('product.index', compact('products', 'count'));
    }


    public  function show($product_name, OrderService $orderservice)
    {
        $products = Product::where('product_name', $product_name)->get();
        $totalOrderValue = $orderservice->calculateOrderValue($products);

        return view('product.show', compact('products', 'totalOrderValue'));
    }

    public function preload()
    {
        $data = Product::select('product_name', 'product_price', 'product_image')
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }


    public function filter(Request $request)
    {
        $sizes = $this->getValues('size');
        $colors = $this->getValues('color');

        $query = Product::query();

        $query->where(function ($q) use ($sizes) {
            foreach ($sizes as $size) {
                $q->orWhereJsonContains('product_sizes', $size);
            }
        })
        ->where('product_price', '>=', request('min-price',0))
        ->where('product_price', '<=', request('max-price',5000));


        $products = $query->get();
        // dd($products);

        return $products->isEmpty() ? view('components.products.empty') : view('components.products.show', compact('products'));
    }

    private function getValues($param)
    {

        $queryString = $_SERVER['QUERY_STRING'] ?? '';
        $values = [];

        preg_match_all('/(?:^|&)' . preg_quote($param) . '=([^&]*)/', $queryString, $matches);
        if (!empty($matches)) {
            $values = array_map('urldecode', $matches[1]);
        }

        return $values;
    }
}
