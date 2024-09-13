<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq')->insert([
            'question' => 'Can I invest using cryptocurrency?',
            'answer' => 'Yes!',
        ]);
        DB::table('faq')->insert([
            'question' => 'How long do I receive money in my account after a withdrawal request?',
            'answer' => 'We process withdrawal requests instantaneously during office hours.',
        ]);
        DB::table('faq')->insert([
            'question' => 'How much do I earn per referral?',
            'answer' => 'Everytime someone signs up with your affiliate link, you get a predisclosed percentage of their first investment capital.',
        ]);
    }
}
