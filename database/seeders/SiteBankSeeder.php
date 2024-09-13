<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class SiteBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_bank')->insert([
            'banker' => 'Lorem',
            'account_number' => '1233456789',
            'account_name' => 'Lorem Ipsum',
            'routing_number' => '123456789',
            'swift_code' => '123456789',
            'wallet_address' => 'gsdvjbknjsdbi',
        ]);
    }
}