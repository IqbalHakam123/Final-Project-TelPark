<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('visitors')->insert([
            [
                'firstname' => 'Annisa',
                'lastname' => 'Fairuz',
                'phone' => '08122222356',
                'age_id' => 1
            ],
            [
                'firstname' => 'Rafly',
                'lastname' => 'Akbar',
                'phone' => '08155577799',
                'age_id' => 2
            ],
            [
                'firstname' => 'Iqbal',
                'lastname' => 'Hakam',
                'phone' => '018245612365',
                'age_id' => 1
            ]
        ]);
    }
}
