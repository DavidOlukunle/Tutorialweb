<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(),
            'tags'=>'maths,English,science',
            'name'=>$this->faker->name(),
             'email'=>$this->faker->companyEmail(),
            'location'=>$this->faker->city(),
            'description'=>$this->faker->paragraph(5),

        ];
    }
}
