<?php

namespace Database\Seeders;

use App\Models\Forum;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $forum = [
            [
                'value' => 'Aku nyaranin buat tambahin lagi crew nya',
            ],
            [
                'value' => 'mending kita agendain ketemu besok',
            ],
            [
                'value' => 'Haloo guys',
            ],
            [
                'value' => 'semangat buat latihan hari ini',
            ],
        ];

        Forum::insert($forum);
    }
}
