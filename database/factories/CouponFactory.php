<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'code'=> strtoupper(fake()->bothify('coupon-####-????')),
           'description'=> fake()->realTextBetween(5,80),
           'min_amt'=> fake()->numberBetween(2000, 5000),
           'max_amt' =>fake()->numberBetween(2000,10000),
           'valid_to'=> fake()->date('Y-m-d', '2035-04-29'),
           'valid_from'=> fake()->date(),
           'is_active'=> fake()->boolean()     
        ];
    }
}
