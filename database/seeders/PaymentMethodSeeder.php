<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date =Carbon::now();
        DB::table('payment_methods')->delete();

        DB::table('payment_methods')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Dinheiro',
                    'description' => 'Meio de pagamento, na forma de moedas ou cédulas, em espécie.',
                    'created_at' => $date,
                    'updated_at' => $date
                ],
                [
                    'id' => 2,
                    'name' => 'Cartão de Crédito',
                    'description' => 'Meio de pagamento à prazo, que permite parcelamento.',
                    'created_at' => $date,
                    'updated_at' => $date
                ],
                [
                    'id' => 3,
                    'name' => 'Cartão de Débito',
                    'description' => 'Meio de pagamento à vista, descontado instantaneamente da conta bancária.',
                    'created_at' => $date,
                    'updated_at' => $date
                ],
                [
                    'id' => 4,
                    'name' => 'PIX',
                    'description' => 'Meio de pagamento online instantâneo.',
                    'created_at' => $date,
                    'updated_at' => $date
                ],
                [
                    'id' => 5,
                    'name' => 'Transferência Bancária - TED',
                    'description' => 'Transferência Eletrônica Disponível. Movimentação de dinheiro entre contas sem restrição de valor.',
                    'created_at' => $date,
                    'updated_at' => $date
                ],
                [
                    'id' => 6,
                    'name' => 'Transferência Bancária - DOC',
                    'description' => 'Documento de Ordem de Crédito. Transações com o valor máximo de R$ 4.999,99.',
                    'created_at' => $date,
                    'updated_at' => $date
                ],

            ]
        );
    }
}
