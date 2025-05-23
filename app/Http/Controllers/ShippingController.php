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
        $data = Address::where('user_id', Auth::id())->get();

        if (! Auth::id()) {
            throw new NotFoundHttp();
        }

        $addresses = $this->getShippingDetails($data);

        return  view('shipping.index', compact('addresses'));
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
            'user_id' => User::where('mobile_number', request('mobile_number'))->first()->id,
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

        $data = Address::where('mobile_number', request('mobile_number'))->get();
        $addresses = $this->getShippingDetails($data);

        return view('shipping.index', compact('addresses'));
    }

    public function edit($id)
    {

        $data = Address::find($id);

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
                "addressDetails" => implode(' ', array_filter([$details->first_name, $details->last_name, $details->address, $details->city, $details->state, $details->postal_code])),
                "mobile_number" => $details->mobile_number
            ];

            array_push($addresses, $address);
        }

        return $addresses;
    }
}
