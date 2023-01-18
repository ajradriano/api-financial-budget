<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date =Carbon::now();
        DB::table('types')->delete();

        DB::table('types')->insert(
            [
                [ 'id' => 1, 'name' => 'Receita', 'description' => '', 'created_at' => $date, 'updated_at' => $date ],
                [ 'id' => 2, 'name' => 'Despesa', 'description' => '', 'created_at' => $date, 'updated_at' => $date ],
            ]
        );
    }
}
