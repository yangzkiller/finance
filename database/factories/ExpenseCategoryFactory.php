<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseCategoryFactory extends Factory
{
    public function definition()
    {
        return [
            'id_user' => 1,
            'category' => $this->faker->word,
            'icon' => 'bi bi-circle-fill',
            'color' => 'red'
        ];
    }
}
