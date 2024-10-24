<?php

namespace Database\Seeders;

use App\Models\VerifyId;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VerifyIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'verify_id' => 0,
                'value' => 'Not Submitted',
            ],
            [
                'verify_id' => 1,
                'value' => 'Submitted',
            ],
            ];

            VerifyId::insert($user);
    }
}
