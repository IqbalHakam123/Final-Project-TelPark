<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LifebuoySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lifebuoys')->insert([
            [
                'name' => 'single',
                'description' => 'yellow',
                'stock' => 50
            ],
            [
                'name' => 'double',
                'description' => 'blue',
                'stock' => 30
            ],
            [
                'name' => 'rompi',
                'description' => 'orange',
                'stock' => 20
            ],
        ]);
    }
}
