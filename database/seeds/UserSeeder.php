<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'id' => '1',
                'name' => 'Admin',
                'email'=> 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'level' => 1
            ],
            [
                'id' => '2',
                'name' => 'User',
                'email'=> 'user@gmail.com',
                'password' => bcrypt('user'),
                'level' => 0
            ]
        ];

        foreach($userData as $value){
            DB::table('users')->insert([
                'id' => $value['id'],
                'name' => $value['name'],
                'email'=> $value['email'],
                'password' => $value['password'],
                'level' => $value['level'],
                'created_at' => Now(),
                'updated_at' => Now()
            ]);
        }
    }
}
