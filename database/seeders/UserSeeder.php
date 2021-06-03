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
                'role' => 'admin'
            ],
            
            [            
                'name' => 'Nahcode Programming',
                'username' => 'nahcode',
                'password' => Hash::make('nahcode21'),
                'role' => 'super_admin'
            ],
            
            [            
                'name' => 'Visitor Ganteng',
                'username' => 'visitor',
                'password' => Hash::make('visitor'),
                'role' => 'visitor'
            ]
            ];
            
        foreach($user as $user){
            User::create($user);
        }
    }
}
