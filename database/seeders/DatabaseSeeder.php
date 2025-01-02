<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Multitenancy\Models\Tenant;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {
    //     $this->call(LaratrustSeeder::class);
    //     $this->call(UserSeeder::class);
    //     $this->call(ClientSeeder::class);
    //     $this->call(CategorySeeder::class);
    // }

    public function run()
    {
        Tenant::checkCurrent()
            ? $this->runTenantSpecificSeeders()
            : $this->runLandlordSpecificSeeders();
    }

    public function runTenantSpecificSeeders()
    {
        // run tenant specific seeders
        $this->call(LaratrustSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(CategorySeeder::class);
    }

    public function runLandlordSpecificSeeders()
    {
        // run landlord specific seeders
        $this->call(LandlordSeeder::class);
    }
}