<?php

namespace Database\Factories;

use App\Utils\Utils;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition()
    {
        $firstName = fake()->firstName();
        $lastName = fake()->lastName();
        $fullName = "$firstName $lastName";
        $login = strtolower(Utils::accentReplacer($firstName.$lastName));
        $email = $login . '@' . fake()->freeEmailDomain();

        $user = [
            'id' => fake()->uuid(),
            'name' => $fullName,
            'email' => $email,
            'login' => $login,
            'email_verified_at' => Carbon::now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];

        return $user;
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
