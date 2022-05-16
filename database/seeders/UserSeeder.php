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
        User::create([
            'name' => 'User1',
            'surname' => 'test1',
            'document' => '123456789',
            'phone_number' => '3042264523',
            'email' => 'user1@test.com',
            'password' => '12345678145',
        ]);

        User::create([
            'name' => 'User2',
            'surname' => 'test2',
            'document' => '1000888999',
            'phone_number' => '3117959431',
            'email' => 'user2@test.com',
            'password' => '1234567813',
        ]);

        User::create([
            'name' => 'User3',
            'surname' => 'test3',
            'document' => '987456123',
            'phone_number' => '3015697842',
            'email' => 'user3@test.com',
            'password' => '1234567812',
        ]);

        User::create([
            'name' => 'User4',
            'surname' => 'test4',
            'document' => '987654321',
            'phone_number' => '3042264523',
            'email' => 'user4@test.com',
            'password' => '1234567811',
        ]);

        User::create([
            'name' => 'User5',
            'surname' => 'test5',
            'document' => '840093916',
            'phone_number' => '254896747',
            'email' => 'user5@test.com',
            'password' => '1234567810',
        ]);

        User::create([
            'name' => 'User6',
            'surname' => 'test6',
            'document' => '25687459',
            'phone_number' => '561487512',
            'email' => 'user6@test.com',
            'password' => '123456789',
        ]);
    }
}
