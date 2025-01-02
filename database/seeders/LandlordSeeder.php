<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandlordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::connection('landlord')->table('tenants')->insert([
            [
            'id' => 1,
            'name' => 'Store1',
            'domain' => 'store1.pos.test',
            'database' => 'pos',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' => 2,
            'name' => 'Store2',
            'domain' => 'store2.pos.test',
            'database' => 'pos2',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);

        // Define Landlord connection
        DB::connection('landlord')->table('mangers')->insert([
            [
                'name' => 'Mohamed Atia',
                'email' => 'manger@pos.com',
                'password' => bcrypt('2480123m'),
            ],
        ]);
    }
}
