<?php

namespace Database\Seeders;

use App\Models\Reservasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReservasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservasi = [
            [
                'name' => 'Anto Kewer',
                'phone' => '082346730994',
                'email' => 'antokewer@gmail.com',
                'uni_id' => '9087',
            ],

            [
                'name' => 'Rafa Zia',
                'phone' => '082344758784',
                'email' => 'rafaziaituseoranggay@gmail.com',
                'uni_id' => '9086',
            ]
            ];

        Reservasi::insert($reservasi);

    }
}
