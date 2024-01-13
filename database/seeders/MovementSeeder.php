<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movement;

class MovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movement::factory(10)->create();

        Movement::factory()->create([
            'id' => fake()->uuid(),
            'user_id' => function () {
                return \App\Models\User::where('login', 'deverson')->first()->id;
            },
            'category_id' => rand(1, 17),
            'type_id' => rand(1, 2),
            'payment_method_id' => rand(1, 6),
            'description' => fake()->sentence(5),
            'value' => fake()->randomFloat(2, 1, 1000),
            'due_date' => fake()->dateTimeBetween('-30 days', '+30 days'),
            'payment_date' => rand(0, 1) === 1 ? fake()->optional()->dateTimeBetween('-30 days', '+30 days') : null,
        ],);
    }
}
