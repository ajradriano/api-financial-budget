<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::factory(10)->create();

         // Developer User Access
         User::factory()->create([
             'id' => fake()->uuid(),
             'name' => 'Deverson Dev',
             'email' => 'deverson'.'@'.fake()->freeEmailDomain(),
             'login' => 'deverson',
             'email_verified_at' => Carbon::now(),
             'user_type' => 1,
             'password' => Hash::make('deverson', [ 'rounds' => 12 ])
         ]);
    }
}
