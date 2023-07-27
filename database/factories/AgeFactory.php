<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Age>
 */
class AgeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->randomElement(['A', 'R', 'D']),
            'name' => fake()->randomElement(['Anak-anak (6-14 Tahun)', 'Remaja (15-23 Tahun)', 'Dewasa']),
        ];
    }
}
