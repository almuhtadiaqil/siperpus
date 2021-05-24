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
        $user=[

            [            
                'name' => 'Super Ganteng',
                'username' => 'superadmin',
                'password' => Hash::make('superadmin'),
                'role' => 'SuperAdmin'
            ],
            
            [            
                'name' => 'Admin Ganteng',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'role' => 'Admin'
            ],
            
            [            
                'name' => 'Visitor Ganteng',
                'username' => 'visitor',
                'password' => Hash::make('visitor'),
                'role' => 'Visitor'
            ]
            ];
            
        foreach($user as $user){
            User::create($user);
        }
    }
}
