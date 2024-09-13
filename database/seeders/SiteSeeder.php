<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('site')->insert([
            'name' => 'Mitosis',
            'email' => 'info@mitosis.test',
            'support_email' => 'support@mitosis.test',
            'phone' => '+123456789',
            'alt_phone' => '+123456789',
            'address' => 'Lorem Ipsum',
            'site_title' => 'Mitosis',
            'description' => Str::random(20),
        ]);
    }
}
