<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date =Carbon::now();
        DB::table('categories')->delete();

        DB::table('categories')->insert(
            [
                [ 'id' => 1,    'name' => 'Água',               'description' => '', 'created_at' => $date, 'updated_at' => $date ],
                [ 'id' => 2,    'name' => 'Alimentação',        'description' => '', 'created_at' => $date, 'updated_at' => $date ],
                [ 'id' => 3,    'name' => 'Aluguel',            'description' => '', 'created_at' => $date, 'updated_at' => $date ],
                [ 'id' => 4,    'name' => 'Despesas diversas',  'description' => '', 'created_at' => $date, 'updated_at' => $date ],
                [ 'id' => 5,    'name' => 'Educação',           'description' => '', 'created_at' => $date, 'updated_at' => $date ],
                [ 'id' => 6,    'name' => 'Fatura do cartão',   'description' => '', 'created_at' => $date, 'updated_at' => $date ],
                [ 'id' => 7,    'name' => 'Gastos com veículo', 'description' => '', 'created_at' => $date, 'updated_at' => $date ],
                [ 'id' => 8,    'name' => 'Impostos e taxas',   'description' => '', 'created_at' => $date, 'updated_at' => $date ],
                [ 'id' => 9,    'name' => 'Lazer',              'description' => '', 'created_at' => $date, 'updated_at' => $date ],
                [ 'id' => 10,   'name' => 'Luz',                'description' => '', 'created_at' => $date, 'updated_at' => $date ],
                [ 'id' => 11,   'name' => 'Outros',             'description' => '', 'created_at' => $date, 'updated_at' => $date ],
                [ 'id' => 12,   'name' => 'Prestação lojas',    'description' => '', 'created_at' => $date, 'updated_at' => $date ],
                [ 'id' => 13,   'name' => 'Prestação veículo',  'description' => '', 'created_at' => $date, 'updated_at' => $date ],
                [ 'id' => 14,   'name' => 'Salário',            'description' => '', 'created_at' => $date, 'updated_at' => $date ],
                [ 'id' => 15,   'name' => 'Saúde',              'description' => '', 'created_at' => $date, 'updated_at' => $date ],
                [ 'id' => 16,   'name' => 'Telefone',           'description' => '', 'created_at' => $date, 'updated_at' => $date ],
                [ 'id' => 17,   'name' => 'Venda',              'description' => '', 'created_at' => $date, 'updated_at' => $date ],
            ]
        );
    }
}
