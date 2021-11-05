<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => $this->faker->words(3, true),
            'price' => $this->faker->randomNumber(4),
            'description' => $this->faker->paragraph(3),
            'status' => $this->faker->boolean(),
            'cat_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9]),
            'image' => $this->faker->image(storage_path('images'),200,200, 'cats',false)
        ];
    }
}
