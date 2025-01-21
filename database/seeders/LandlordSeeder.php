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
<<<<<<< HEAD
            ]
=======
        ],
        [
            'id' => 2,
            'name' => 'Store2',
            'domain' => 'store2.pos.test',
            'database' => 'pos2',
            'created_at' => now(),
            'updated_at' => now(),
        ],
>>>>>>> 5dac875f776f9454fca7f985b467d23842f685f5
        ]);

        // Define Landlord connection
        DB::connection('landlord')->table('users')->insert([
            [
                'name' => 'Mohamed Atia',
                'email' => 'manager@pos.com',
                'password' => bcrypt('2480123m'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
