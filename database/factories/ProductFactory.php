<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->lastName(),
            'stock' => fake()->randomNumber(5, false),
            'price' => fake()->randomFloat(2),
            'merm' => fake()->dateTimeBetween('-1 week','+1 week'),
            'supplier_id' => fake()->numberBetween(1,19),
            'category_id' => fake()->numberBetween(1,5),
        ];
    }
}
