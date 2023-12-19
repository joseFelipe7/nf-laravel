<?php

namespace Database\Seeders\Tests;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nfs')->insert([
            [ 
                'user_id' => 1,
                'nf_code' => '999999999',
                'value' => 1.10,
                'date_issue' => '2023-12-17',
                'sender_cnpj' => '92314143000196',
                'sender_name' => 'Remetente 92314143000196',
                'delivery_cnpj' => '79858926000172',
                'delivery_name' => 'Transportador 79858926000172'
            ],
            [ 
                'user_id' => 1,
                'nf_code' => '888888888',
                'value' => 2.10,
                'date_issue' => '2023-12-17',
                'sender_cnpj' => '04980424000110',
                'sender_name' => 'Remetente 04980424000110',
                'delivery_cnpj' => '05986789000115',
                'delivery_name' => 'Transportador 05986789000115'
            ],
        ]);
    }
}
