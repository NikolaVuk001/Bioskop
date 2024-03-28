<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0 ; $i < 12; $i++) {
            for ($j = 0; $j < 12; $j++) {
                \DB::table('sedistes')->insert([
                    'oznaka' => $i+1 . '-' . $j+1,
                    'sala' => '1',
                    ]);
                }
            }
    }
}
