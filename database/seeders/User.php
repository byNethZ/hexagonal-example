<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 11; $i++) {
            DB::table('users')->insert([
                'username' => 'user' . $i,
                'first_name' => 'first_name' . $i,
                'last_name' => 'last_name' . $i,
                'email' => 'user_' . $i . '@gmail.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
