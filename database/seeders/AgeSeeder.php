<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Ages')->insert([
            [
                'code' => 'A',
                'name' => 'Anak-anak'
            ],
            [
                'code' => 'R',
                'name' => 'Remaja'
            ],
            [
                'code' => 'D',
                'name' => 'Dewasa'
            ]
        ]);
    }
}
