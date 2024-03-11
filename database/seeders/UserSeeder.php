<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\Models\user;
use App\Models\Roleuser;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
        
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '083806605069',
            'password' =>  Hash::make('password'),
            'role_id' => 1
        ]);
       
        User::create([
            'name' => 'Owner',
            'email' => 'owner@gmail.com',
            'phone' => '088806605063',
            'password' =>  Hash::make('password'),
            'role_id' => 2
        ]);

        Roleuser::create([
            'name' => 'Administrator'
        ]);

        Roleuser::create([
            'name' => 'Owner'
        ]);

    }
}
