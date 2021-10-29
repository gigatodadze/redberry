<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => Hash::make('password')
        ]);

        DB::table('users')->insert([
            'name' => 'Giga Todadze',
            'email' => 'g.todadze@developeres-alliance.com',
            'password' => Hash::make('password')
        ]);

        DB::table('users')->insert([
            'name' => 'Mate Todadze',
            'email' => 'm.todadze@developeres-alliance.com',
            'password' => Hash::make('password')
        ]);
    }
}
