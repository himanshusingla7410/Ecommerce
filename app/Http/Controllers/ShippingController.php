<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundHttp;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{

    public function index()
    {

        if (! Auth::id()) {
            throw new NotFoundHttp();
        }

        $orderAmt = request('final-order-amt');
        $couponUsed = request('final-coupon-used');
        $savings = request('final-savings');
        $addresses = $this->getShippingDetails(Address::where('user_id', Auth::id())->get());
        $totalAmt = $orderAmt - $savings;
        request()->session()->put([
            'orderAmt' => $orderAmt,
            'couponUsed' => $couponUsed,
            'savings' => $savings,
            'totalAmt' => $orderAmt - $savings
        ]);


        return  view('shipping.index', compact('addresses', 'orderAmt', 'couponUsed', 'savings', 'totalAmt'));
    }

    public function store()
    {

        request()->validate([
            'first_name' => ['required', 'string', 'max:255', 'min:2'],
            'last_name' => ['required', 'string', 'max:255', 'min:2'],
            'email' => ['required', 'string', 'max:255', 'email'],
            'country' => ['required', 'string', 'max:255', 'min:2'],
            'mobile_number' => ['required', 'integer', 'digits_between:2,10'],
            'address' => ['required', 'string', 'max:255', 'min:2'],
            'city' => ['required', 'string', 'max:255', 'min:2'],
            'state' => ['required', 'string', 'max:255', 'min:2'],
            'postal_code' => ['required', 'integer', 'digits_between:2,10'],
        ]);

        Address::create([
            'user_id' => User::where('id', Auth::id())->first()->id,
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'country' => request('country'),
            'mobile_number' => request('mobile_number'),
            'address' => request('address'),
            'city' => request('city'),
            'state' => request('state'),
            'postal_code' => request('postal_code'),
        ]);

        $addresses = $this->getShippingDetails(Address::where('user_id', Auth::id())->get());
        $orderAmt = request()->session()->get('orderAmt');
        $couponUsed = request()->session()->get('couponUsed');
        $savings = request()->session()->get('savings');
        $totalAmt = request()->session()->get('totalAmt');

        
        return view('shipping.index', compact('addresses', 'orderAmt', 'couponUsed', 'savings', 'totalAmt'));
    }

    public function edit($id)
    {

        $data = Address::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }



    public function getShippingDetails($data)
    {

        $addresses = [];

        foreach ($data as $details) {

            $address = [
                "id" => $details->id,
                "name" => implode(' ', array_filter([$details->first_name, $details->last_name])),
                "addressDetails" => $details->address,
                "email" => $details->email,
                "city" => $details->city,
                "state" => $details->state,
                "postal_code" => $details->postal_code,
                "mobile_number" => $details->mobile_number
            ];

            array_push($addresses, $address);
        }

        return $addresses;
    }

    public function check()
    {

        dd(request());
    }
}
