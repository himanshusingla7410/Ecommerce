<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterationController extends Controller
{


    public function store()
    {

        request()->validate([
            'mobile_number' => 'Min:10|required'
        ]);

        $user = User::where([
            'mobile_number' => request('mobile_number')
        ])->first();

        
        if (! $user) {

            $user = User::create([
                'mobile_number' => request('mobile_number')
            ]);
        }

        Auth::login($user);

        return response()->json([
            'status'=> 'success'
        ]);
    }
}
