<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(3,true),
            'price' => $this->faker->randomNumber(4),
            'description' => $this->faker->paragraph(3),
            'status' => $this->faker->boolean(),
        ];
    }


}
