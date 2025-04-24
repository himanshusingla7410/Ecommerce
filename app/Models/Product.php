<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $casts = [
        'product_sizes' =>'array',
        'product_image' => 'array'
    ];
    
    public function carts(){

        return $this->hasMany(Cart::class);
    }

}
