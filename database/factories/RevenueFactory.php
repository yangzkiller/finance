<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RevenueFactory extends Factory
{
    public function definition()
    {
        return [
            'id_user' => 1,
            'id_category' => $this->faker->numberBetween(1,10),
            'value' => $this->faker->randomFloat(2, 10, 100),
            'description' => $this->faker->word,
            'pending' => $this->faker->boolean,
            'fixed' => $this->faker->boolean,
            'date' => $this->faker->dateTimeThisDecade,
        ];
    }
}