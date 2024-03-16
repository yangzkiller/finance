<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'PEDRO CLISESQUE',
            'cpf' => '228.062.518-00',
            'email' => 'clisesque2k18@gmail.com',
            'password' => '$2a$12$6Mc87M2RU2iQ8gmnQHkoQORsRZlBPxVEZh0pybypsmSf/72s0XFqO', 
            'remember_token' => Str::random(10),
            'active' => 1
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
