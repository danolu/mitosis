<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        UserSeeder::class,
        AdminSeeder::class,
        SiteSeeder::class,
        SiteBankSeeder::class,
        AboutSiteSeeder::class,
        FaqSeeder::class,
        ReviewSeeder::class,
        CurrencySeeder::class,
        PlanSeeder::class,
    ]);
    }
}