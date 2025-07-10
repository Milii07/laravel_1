<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string,mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> $this->faker->sentence,
            'description'=>"tettsfsfsfsf",
            'long_description'=>"sfsfsfsfsfsf",       
            'completed'=>$this->faker->boolean
        ];
    }
}
