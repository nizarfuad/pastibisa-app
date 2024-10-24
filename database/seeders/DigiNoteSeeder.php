<?php

namespace Database\Seeders;

use App\Models\DigiNote;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DigiNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datakeung = [
            [
                'keperluan' => 'Beli kamera',
                'jumlah' => 1,
                'harga' => 400000,
                'submitted_by' => 'PH Bayu',
                'attachment' => 'link to content',
                'tipe' => 2
            ],

            [
                'keperluan' => 'Beli laptop',
                'jumlah' => 3,
                'harga' => 500000,
                'submitted_by' => 'PH Rafa',
                'attachment' => 'link to content',
                'tipe' => 1
            ],
            ];

            DigiNote::insert($datakeung);
    }
}
