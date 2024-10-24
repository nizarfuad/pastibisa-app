<?php

namespace Database\Seeders;

use App\Models\Keuangan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datakeung = [
            [
                'user_id' => 1,
                'keperluan' => 'Beli kamera',
                'jumlah' => 1,
                'harga' => 400000,
                'attachment' => 'link to content',
                'tipe_id' => 2,
                'satuan_id' => 1
            ],

            [
                'user_id' => 2,
                'keperluan' => 'Beli laptop',
                'jumlah' => 3,
                'harga' => 700000,
                'attachment' => 'link to content',
                'tipe_id' => 1,
                'satuan_id' => 2
            ],
            [
                'user_id' => 2,
                'keperluan' => 'Beli babi',
                'jumlah' => 3,
                'harga' => 300000,
                'attachment' => 'link to content',
                'tipe_id' => 1,
                'satuan_id' => 2
            ],
            [
                'user_id' => 1,
                'keperluan' => 'Beli anjing',
                'jumlah' => 3,
                'harga' => 400000,
                'attachment' => 'link to content',
                'tipe_id' => 1,
                'satuan_id' => 1
            ],
            [
                'user_id' => 3,
                'keperluan' => 'Beli tikus',
                'jumlah' => 3,
                'harga' => 300000,
                'attachment' => 'link to content',
                'tipe_id' => 1,
                'satuan_id' => 3
            ],
            [
                'user_id' => 1,
                'keperluan' => 'Beli keledai',
                'jumlah' => 3,
                'harga' => 400000,
                'attachment' => 'link to content',
                'tipe_id' => 1,
                'satuan_id' => 3
            ],
            ];

            Keuangan::insert($datakeung);
    }
}
