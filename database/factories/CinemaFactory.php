<?php

namespace Database\Factories;

use App\Models\Cinema;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cinema>
 */
class CinemaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'town' => $this->faker->city(),
            'visibility' => $this->faker->boolean(),
            'address' => $this->faker->address(),
            'image' => $this->faker->imageUrl(640, 460, 'cinema')
        ];
    }
}
