<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterationController extends Controller
{

    public function index(){

        return redirect('/');

    }


    public function store()
    {

        request()->validate([
            'mobile_number' => ['Min:10','required']
        ]);

        $user = User::firstOrCreate([
            'mobile_number' => request('mobile_number')
        ]);
        
        Auth::login($user);
        request()->session()->flash('loginStatus', 'success');
        return back()->with([
            'couponCode' => 'WELCOME 200'
        ]);
    }
}
