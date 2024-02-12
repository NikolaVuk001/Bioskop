<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        for ($i = 0 ; $i < 12; $i++) {
            for ($j = 0; $j < 12; $j++) {
                DB::table('sedistes')->insert([
                    'oznaka' => $i+1 . '-' . $j+1,
                    'sala' => '1',
                    ]);
                }
            }

        
    }
}
