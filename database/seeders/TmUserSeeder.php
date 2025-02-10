<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TmUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'user_nama' => 'admin',
                'user_pass' => 'admin123',
                'user_hak' => 'ad',
                'user_sts' => 'ak'
            ],
            [
                'user_nama' => 'superuser',
                'user_pass' => 'superuser',
                'user_hak' => 'su',
                'user_sts' => 'ak'
            ],
            [
                'user_nama' => 'operator',
                'user_pass' => 'operator123',
                'user_hak' => 'op',
                'user_sts' => 'ak'
            ],
            [
                'user_nama' => 'operator1',
                'user_pass' => 'operator123',
                'user_hak' => 'op',
                'user_sts' => 'ak'
            ],
            [
                'user_nama' => 'operator2',
                'user_pass' => 'operator123',
                'user_hak' => 'op',
                'user_sts' => 'ak'
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
