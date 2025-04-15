<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->string('mobile_no')->nullable();
            $table->string('product_name');
            $table->string('product_size');
            $table->integer('product_quantity');
            $table->integer('product_price');
            $table->string('product_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
