<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Str;
use Illuminate\Support\Facades\DB;

class InvestmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('investments')->insert([
            'user_id' => 1,
            'plan_id' => 1,
            'capital' => 350000,
            'interest' => 50000,
            'start_date' => '2020-11-21 09:47:02',
            'end_date' => '2021-02-02 09:47:02',
            'ref' => Str::random(8),
        ]);
        DB::table('investments')->insert([
            'user_id' => 1,
            'plan_id' => 2,
            'capital' => 50000,
            'interest' => 20000,
            'start_date' => '2020-11-21 09:47:02',
            'end_date' => '2021-02-02 09:47:02',
            'ref' => Str::random(8),
        ]);
        DB::table('investments')->insert([
            'user_id' => 1,
            'plan_id' => 3,
            'capital' => 1000000,
            'interest' => 300000,
            'start_date' => '2020-11-21 09:47:02',
            'end_date' => '2021-02-02 09:47:02',
            'ref' => Str::random(8),
        ]);
        DB::table('investments')->insert([
            'user_id' => 1,
            'plan_id' => 1,
            'capital' => 4444444,
            'interest' => 22200,
            'autorenewal' => 1,
            'start_date' => '2020-11-21 09:47:02',
            'end_date' => '2021-02-02 09:47:02',
            'ref' => Str::random(8),
        ]);
        DB::table('investments')->insert([
            'user_id' => 1,
            'plan_id' => 1,
            'capital' => 350000,
            'interest' => 50000,
            'start_date' => '2020-11-21 09:47:02',
            'status' => 1,
            'end_date' => '2021-02-02 09:47:02',
            'ref' => Str::random(8),
        ]);
        DB::table('investments')->insert([
            'user_id' => 1,
            'plan_id' => 2,
            'capital' => 50000,
            'interest' => 20000,
            'start_date' => '2020-11-21 09:47:02',
            'status' => 1,
            'end_date' => '2021-02-02 09:47:02',
            'ref' => Str::random(8),
        ]);
        DB::table('investments')->insert([
            'user_id' => 1,
            'plan_id' => 3,
            'capital' => 1000000,
            'interest' => 300000,
            'start_date' => '2020-11-21 09:47:02',
            'end_date' => '2021-02-02 09:47:02',
            'ref' => Str::random(8),
        ]);
        DB::table('investments')->insert([
            'user_id' => 1,
            'plan_id' => 1,
            'capital' => 4444444,
            'interest' => 22200,
            'autorenewal' => 1,
            'status' => 1,
            'start_date' => '2020-11-21 09:47:02',
            'end_date' => '2021-02-02 09:47:02',
            'ref' => Str::random(8),
        ]);
    }
}
