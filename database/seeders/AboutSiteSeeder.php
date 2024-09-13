<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutSite;
use Str;

class AboutSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutSite::insert([
            'about' => Str::random(200),
            'terms' => Str::random(200),
            'privacy_policy' => Str::random(200),
        ]);
    }
}