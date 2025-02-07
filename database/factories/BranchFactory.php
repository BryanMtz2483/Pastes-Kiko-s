<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->city(),
            'phone' => 1234,
            'rfc' => fake()->md5(),
            'address' => fake()->streetAddress(),
            'cp' => fake()->randomDigit(10000,99999),
        ];
    }
}
