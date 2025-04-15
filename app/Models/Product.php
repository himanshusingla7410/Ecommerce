<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=[];

    protected $casts = [
        'images' => 'array'
    ];
    
    public function carts(){

        return $this->hasMany(Cart::class);


    }


}
