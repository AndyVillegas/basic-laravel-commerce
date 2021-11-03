<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(rand(1,3),true),
            //'image'=>'https://random.imagecdn.app/1200/700',
            'image'=> $this->faker->imageUrl(1280,740)
        ];
    }
}
