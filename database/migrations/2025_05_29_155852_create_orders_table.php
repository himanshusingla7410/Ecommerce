<?php

use App\Models\Address;
use App\Models\Coupon;
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
            $table->foreignIdFor(User::class);
            $table->string('order_number');
            $table->foreignIdFor(Address::class);
            $table->string('status')->default('pending');
            $table->string('payment_status')->nullable();
            $table->string('total_amount');
            $table->foreignIdFor(Coupon::class)->nullable();
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
