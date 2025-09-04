<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Stancl\Tenancy\Database\Models\Domain;

final class TestTenancyCommand extends Command {
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'tenancy:test';

    /**
     * The console command description.
     */
    protected $description = 'Test tenancy configuration by creating a sample tenant';

    /**
     * Execute the console command.
     */
    public function handle(): int {
        $this->info('🧪 Testing Tenancy Configuration...');

        try {
            // Create a test tenant
            $tenant = Tenant::create([
                'name' => 'Test Business',
                'plan_id' => 'starter',
                'status' => 'active',
                'settings' => [
                    'timezone' => 'UTC',
                    'currency' => 'USD',
                ],
                'limits' => [
                    'bookings_per_month' => 200,
                    'users' => 3,
                ],
            ]);

            $this->info("✅ Tenant created: {$tenant->id} - {$tenant->name}");

            // Create a domain for the tenant
            $domain = Domain::create([
                'domain' => "test-{$tenant->id}.reasy.test",
                'tenant_id' => $tenant->id,
            ]);

            $this->info("✅ Domain created: {$domain->domain}");

            // Test tenant connection
            tenancy()->initialize($tenant);

            $this->info('✅ Tenancy initialized successfully');
            $this->info("📊 Current tenant: " . tenant('name'));
            $this->info("🆔 Current tenant ID: " . tenant('id'));

            // Test database connection within tenant context
            $connectionName = app('db')->getDefaultConnection();
            $this->info("📡 Current DB connection: {$connectionName}");

            // Run migrations on tenant database
            $this->info('🔄 Running tenant migrations...');

            // Run migrations manually
            Artisan::call('migrate', [
                '--path' => 'database/migrations/tenant',
                '--realpath' => true,
                '--force' => true,
            ]);

            $this->info('✅ Tenant migrations completed');

            tenancy()->end();
            $this->info('✅ Tenancy ended successfully');

            $this->newLine();
            $this->info('🎉 Tenancy configuration is working correctly!');
            $this->info("🌐 Test tenant URL: http://test-{$tenant->id}.reasy.test:8000");

            return self::SUCCESS;
        } catch (\Exception $e) {
            $this->error('❌ Tenancy test failed: ' . $e->getMessage());
            $this->error('Stack trace: ' . $e->getTraceAsString());

            return self::FAILURE;
        }
    }
}
