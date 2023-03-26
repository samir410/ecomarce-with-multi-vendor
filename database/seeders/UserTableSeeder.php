<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Admin Samir',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('111'),
            'role' =>'admin',
            'status' => 'active',
        ],  
        ['name' => 'User Santo',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('222'),
            'role' =>'user',
            'status' => 'active',
        ],   
        ['name' => 'Vendor Bepu',
            'username' => 'vendor',
            'email' => 'vendor@gmail.com',
            'password' => Hash::make('333'),
            'role' =>'vendor',
            'status' => 'active',
        ],    
        ]);
    }
}
