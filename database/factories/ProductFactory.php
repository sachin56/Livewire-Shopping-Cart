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
            'name' => $this->faker->unique()->word() . ' ' . $this->faker->randomElement(['Kit', 'Mug', 'Tool', 'Book', 'Decal']),
            'price' => $this->faker->randomFloat(2, 5, 200),
            'image_url' => 'https://picsum.photos/seed/' . $this->faker->numberBetween(100, 999) . '/200/150',
        ];
    }
}
