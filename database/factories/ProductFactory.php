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
            'category_id' => rand(1,6),
            'name' => $this->faker->sentence(3,true),
            'code' => $this->faker->unique()->word,
            //'description' => $this->faker->text(130),
            'image'=> $this->faker->imageUrl(400,300),
            //'image'=>'https://random.imagecdn.app/400/400',
            'pvp' => $this->faker->randomFloat(2,0,100),
            'cost' => $this->faker->randomFloat(2,0,100)
        ];
    }
}
