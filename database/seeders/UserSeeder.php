<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [

            [
                'name' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'role' => 'admin'
            ],

            [
                'name' => 'Petugas',
                'username' => 'petugas',
                'password' => Hash::make('petugas'),
                'role' => 'petugas'
            ]
        ];

        foreach ($user as $user) {
            User::create($user);
        }
    }
}
