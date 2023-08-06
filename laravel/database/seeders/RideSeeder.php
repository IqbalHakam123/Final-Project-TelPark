<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rides')->insert([
            [
                'name' => 'Kolam Arus'
            ],
            [
                'name' => 'Tube Slide'
            ],
            [
                'name' => 'Big Tornado'
            ],
        ]);
    }
}
