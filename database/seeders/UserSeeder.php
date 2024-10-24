<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $master = User::create([
                'name' => 'Admin Admin',
                'username' => 'myadmin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('12345678'),
            ]);

        $ph = User::create([
                'name' => 'PH Daprut',
                'username' => 'dffpra',
                'email' => 'daprut@ph.com',
                'password' => bcrypt('12345678'),
        ]);

        $crew = User::create([
                'name' => 'Crew Bagus',
                'username' => 'bausmaul',
                'email' => 'bagus@crew.com',
                'password' => bcrypt('12345678'),
        ]);

        $master->assignRole('master');
        $ph->assignRole('ph');
        $crew->assignRole('crew');

            // User::insert($user);
    }
}
