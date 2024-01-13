<?php
// database/factories/MovementFactory.php

namespace Database\Factories;

use App\Models\Movement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MovementFactory extends Factory
{
    protected $model = Movement::class;

    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'category_id' => rand(1, 17),
            'type_id' => rand(1, 2),
            'payment_method_id' => rand(1, 6),
            'description' => fake()->sentence(5),
            'value' => fake()->randomFloat(2, 1, 1000),
            'due_date' => fake()->dateTimeBetween('-30 days', '+30 days'),
            'payment_date' => rand(0, 1) === 1 ? fake()->optional()->dateTimeBetween('-30 days', '+30 days') : null,
        ];
    }
}
