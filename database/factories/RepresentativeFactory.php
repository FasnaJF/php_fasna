<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RepresentativeFactory extends Factory
{
    public function definition()
    {
        return [
            'full_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'telephone' => fake()->phoneNumber(),
            'current_route' => fake()->city(),
            'joined_date' => fake()->dateTime(),
            'comments' => fake()->paragraph(3),
        ];
    }
}
