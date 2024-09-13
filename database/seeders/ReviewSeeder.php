<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'name' => 'Lorem Ipsum',
            'occupation' => 'Lorem',
            'review' => "lorem ipsum.",
        ]);
        DB::table('reviews')->insert([
            'name' => 'Lorem Ipsum',
            'occupation' => 'Lorem',
            'review' => "lorem ipsum.",
        ]);
        DB::table('reviews')->insert([
            'name' => 'Lorem Ipsum',
            'occupation' => 'Lorem',
            'review' => "lorem ipsum.",
        ]);
    }
}
