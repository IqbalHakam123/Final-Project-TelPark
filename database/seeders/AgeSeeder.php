<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Age;

class AgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('Ages')->insert([
        //     [
        //         'code' => 'A',
        //         'name' => 'Anak-anak (6-14 Tahun)'
        //     ],
        //     [
        //         'code' => 'R',
        //         'name' => 'Remaja (15-23 Tahun)'
        //     ],
        //     [
        //         'code' => 'D',
        //         'name' => 'Dewasa'
        //     ]
        // ]);
        age::factory()->count(3)->create();
    }
}
