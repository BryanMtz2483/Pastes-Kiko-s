<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'refNumber' => fake() -> randomDigit(10000,99999),
            'subtotal' => fake() -> randomFloat(0,1000),
            'total' => fake()->randomFloat(0,1000),
            'iva' => fake()->randomFloat(0,50),
        ];
    }
}
