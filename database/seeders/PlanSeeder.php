<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            'name' => 'Standard',
            'interest' => 25,
            'min_capital' => 100,
            'max_capital' => 999,
            'duration' => 1,
            'period' => 'month',
            'ref_percent' => '5',
        ]);

        DB::table('plans')->insert([
            'name' => 'Premium',
            'interest' => 40,
            'min_capital' => 1000,
            'max_capital' => 2499,
            'duration' => 2,
            'period' => 'month',
            'ref_percent' => '5',
        ]);

        DB::table('plans')->insert([
            'name' => 'Gold',
            'interest' => 60,
            'min_capital' => 2500,
            'max_capital' => 5000,
            'duration' => 3,
            'period' => 'month',
            'ref_percent' => '5',
        ]);
    }
}
