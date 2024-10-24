<?php

namespace Database\Seeders;

use App\Models\Tipe;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipe = [
            [
                'tipe_id' => 1,
                'tipe' => 'Pemasukan',
                'color' => 'success',
            ],
            [
                'tipe_id' => 2,
                'tipe' => 'Pengeluaran',
                'color' => 'danger',
            ],
            [
                'tipe_id' => 3,
                'tipe' => 'Lainnya',
                'color' => 'info',
            ],
            [
                'tipe_id' => 0,
                'tipe' => 'Tidak tahu',
                'color' => 'secondary',
            ],
        ];

        Tipe::insert($tipe);
    }
}
