<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use Illuminate\Support\Facades\DB;
use Str;
Use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Harry',
            'last_name' => 'Potter',
            'username' => 'lorem',
            'phone' => '000000000',
            'balance' => 1000000,
            'profits' => 0,
            'street' => '5, Privet Drive',
            'zip' => '12345',
            'city' => 'London',
            'state' => 'London',
            'country' => 'London',
            'email_verified_at' => Carbon::now(),
            'email' => 'user@test.com',
            'password' => Hash::make('password'),
        ]);
    }
}
