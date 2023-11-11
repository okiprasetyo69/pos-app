<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
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
               'name'=>'Super Admin',
               'email'=>'superadmin@test.com',
                'role'=>'superadmin',
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'Sales',
               'email'=>'sales@test.com',
               'role'=>'sales',
              'password'=> bcrypt('12345678'),
            ],
            [
                'name'=>'Purchase',
                'email'=>'purchase@test.com',
                'role'=>'purchase',
               'password'=> bcrypt('12345678'),
            ],
            [
                'name'=>'Manager',
                'email'=>'manager@test.com',
                'role'=>'manager',
               'password'=> bcrypt('12345678'),
            ],
            [
                'name'=>'Consumer',
                'email'=>'consumer@test.com',
                'role'=>'consumer',
               'password'=> bcrypt('12345678'),
            ], 
            [
                'name'=>'Member',
                'email'=>'member@test.com',
                'role'=>'member',
                'password'=> bcrypt('12345678'),
            ], 
            [
              'name'=>'Cashier',
              'email'=>'cashier@test.com',
              'role'=>'cashier',
              'password'=> bcrypt('12345678'),
            ], 
            [
               'name'=>'Consumer-2',
               'email'=>'consumer-2@test.com',
               'role'=>'consumer',
              'password'=> bcrypt('12345678'),
            ], 
            [
               'name'=>'Member-1',
               'email'=>'member-1@test.com',
               'role'=>'consumer',
               'is_member' => true,
               'password'=> bcrypt('12345678'),
            ], 
            [
               'name'=>'Member-2',
               'email'=>'member-2@test.com',
               'role'=>'consumer',
               'is_member' => true,
               'password'=> bcrypt('12345678'),
            ], 
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
