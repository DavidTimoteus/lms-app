<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            ['level_id' => 1, 'level_code' => 'ADM', 'level_name' => 'Administrator'],
            ['level_id' => 2, 'level_code' => 'PGJ', 'level_name' => 'Pengajar'],
            ['level_id' => 3, 'level_code' => 'MHS', 'level_name' => 'Mahasiswa'],
        ];
        DB::table('m_level')->insert($data);

        $data = [
            ['category_id' => 1, 'name' => 'Web Developer'],
            ['category_id' => 2, 'name' => 'Business'],
            ['category_id' => 3, 'name' => 'UI/UX Design'],
        ];
        DB::table('m_category')->insert($data);

        $data = [
            [
                'user_id' => 1,
                'level_id' => 1,
                'email' => 'admin@gmail.com',
                'name' => 'Administrator',
                'password' => Hash::make('admin123'),
            ],
            [
                'user_id' => 2,
                'level_id' => 2,
                'email' => 'pengajar@gmail.com',
                'name' => 'Pengajar',
                'password' => Hash::make('pengajar123'),
            ],
            [
                'user_id' => 3,
                'level_id' => 3,
                'email' => 'mahasiswa@gmail.com',
                'name' => 'Mahasiswa',
                'password' => Hash::make('mahasiswa123'),
            ],
        ];
        DB::table('m_user')->insert($data);
    }
}
