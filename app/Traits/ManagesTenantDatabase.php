<?php

namespace App\Traits;

use App\Models\Tenant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;

trait ManagesTenantDatabase
{
    /**
     * Create a new database for the tenant.
     *
     * @param string $databaseName
     * @throws \Exception
     */
    protected function createTenantDatabase(string $databaseName)
    {
        // Validate database name
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $databaseName)) {
            throw new \Exception('Invalid database name');
        }

        // Create the database
        DB::statement("CREATE DATABASE `$databaseName`");
    }

    /**
     * Run migrations for the tenant's database.
     *
     * @param string $databaseName
     * @return void
     */
    protected function runTenantMigrations(string $databaseName)
    {
        // Purge any previous connections
        DB::purge('landlord');
        DB::purge('tenant');

        // Switch to the 'landlord' database connection
        Config::set('database.default', 'tenant');
        DB::reconnect('tenant');
        DB::setDefaultConnection('tenant');

        // Find Tenant Id
        $tenant = Tenant::where('database',$databaseName)->first();
        $tenantId = $tenant->id;

        Artisan::call('tenant:run-migrations', [
            'tenantId' => $tenantId,
        ]);
    }

    protected function updateTenantDatabase(string $oldDatabaseName, string $newDatabaseName)
    {

        // Check if the new database is already exists
        $databaseExists = DB::select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?", [$newDatabaseName]);
        if ($databaseExists) {
            throw new \Exception("Database '$newDatabaseName' already exists.");
        }

        // Change the database name
        try {
            // Step 1: Create the new database
            DB::statement("CREATE DATABASE `$newDatabaseName`");

            // Step 2: Get all tables from the old database
            $tables = DB::select("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = ?", [$oldDatabaseName]);

            // Step 3: Move each table to the new database
            foreach ($tables as $table) {
                $tableName = $table->TABLE_NAME;
                DB::statement("RENAME TABLE `$oldDatabaseName`.`$tableName` TO `$newDatabaseName`.`$tableName`");
            }

            // Step 4 (Optional): Drop the old database
            DB::statement("DROP DATABASE `$oldDatabaseName`");

        } catch (\Exception $e) {
            throw new \Exception("Error renaming database: " . $e->getMessage());
        }
    }

    protected function deleteTenantDatabase(string $databaseName){

        // Check if the database exists
        $databaseExists = DB::select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?", [$databaseName]);

        if (!$databaseExists) {
            throw new \Exception("Database '$databaseName' does not exist.");
        }

        // Drop the database
        DB::statement("DROP DATABASE `$databaseName`");
    }
}
