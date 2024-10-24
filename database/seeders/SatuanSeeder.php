<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $satuan = [
            [
                'satuan_id' => 1,
                'satuan' => 'kg',
            ],
            [
                'satuan_id' => 2,
                'satuan' => 'pcs',
            ],
            [
                'satuan_id' => 3,
                'satuan' => 'bungkus',
            ],
            [
                'satuan_id' => 4,
                'satuan' => 'karung',
            ],
            [
                'satuan_id' => 0,
                'satuan' => 'lainnya',
            ],
        ];

        Satuan::insert($satuan);
    }
}
