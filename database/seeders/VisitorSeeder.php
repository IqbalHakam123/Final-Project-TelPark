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
                'name' => 'Annisa',
                'phone' => '08122222356',
                'age_id' => 1
            ],
            [
                'name' => 'Rafly',
                'phone' => '08155577799',
                'age_id' => 2
            ],
            [
                'name' => 'Iqbal',
                'phone' => '018245612365',
                'age_id' => 1
            ]
        ]);
    }
}
