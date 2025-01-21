<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class RunTenantMigrations extends Command
{
    protected $signature = 'tenant:run-migrations {tenantId}';
    protected $description = 'Run migrations with seed for a specific tenant';

    /**
        * Execute the console command.
        *
        * @return void
        */
    public function handle()
    {
        $tenantId = $this->argument('tenantId');

        $exitCode = Artisan::call('tenants:artisan', [
            'artisanCommand' => 'migrate --seed',
            '--tenant' => $tenantId,
        ]);

        if ($exitCode === 0) {
            $this->info("Migrations and seeding have been successfully run for tenant $tenantId.");
            Log::info("Migrations and seeding have been successfully run for tenant $tenantId.");
        } else {
            $this->warn("Migrations and seeding have been successfully run for tenant $tenantId.");
            Log::error("There was an error running migrations and seeding for tenant $tenantId.");
        }
    }
}
