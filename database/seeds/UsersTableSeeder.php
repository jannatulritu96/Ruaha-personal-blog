<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'type' => 1, // 1 : Admin , 2: Author
            'name' => "Mr. Owner",
            'email' => "owner@gmail.com",
            'status' => 1,
            'permission' => 1,
            'password' => bcrypt("12345678"),
        ]);
    }
}
