<?php

namespace Database\Seeders;

use App\Models\User;
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
        $userOne = User::create(['name' => 'Jon', 'email' => 'jon@example.com', 'password' => 'secret', 'rating' => 5, 'username' => 'jfhk']);
        $userTwo = User::create(['name' => 'Cole', 'email' => 'cole@example.com', 'password' => 'secretTwo', 'rating' => 1, 'username' => 'jenf']);

        $userOne->missions()->createMany([
            ['title' => 'User One Mission', 'description' => 'I belong to user one!'],
            ['title' => 'First User Second Mission', 'description' => 'I belong to user one!'],
        ]);

        $userTwo->missions()->createMany([
            ['title' => 'User Two Mission', 'description' => 'I belong to user two!'],
            ['title' => 'Second user second Mission', 'description' => 'I belong to user two!'],
        ]);
    }
}
