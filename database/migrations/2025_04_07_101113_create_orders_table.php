<?php

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
        Schema::create('orders', function (Blueprint $table) {
            $table->ulid('id');
            $table->string('product');
            $table->string('size');
            $table->integer('price');
            $table->integer('qty');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->boolean('addToCart');
            $table->boolean('purchased');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
