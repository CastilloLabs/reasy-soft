<?php

namespace App\Console\Commands;

use TenantManagement\Application\DTOs\TenantRegistrationData;
use TenantManagement\Application\Services\RegisterTenantService;
use Illuminate\Console\Command;

class TestTenantRegistration extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:test-register';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test tenant registration functionality';

    /**
     * Execute the console command.
     */
    public function handle(): void {
        $this->info('Testing tenant registration...');

        try {
            // Prepare test data
            $registrationData = TenantRegistrationData::from([
                'business_name' => 'Clínica Dental Test',
                'business_type' => 'health',
                'subdomain' => 'clinica-test-' . rand(1000, 9999),
                'email' => 'admin@clinica-test.com',
                'first_name' => 'Juan',
                'last_name' => 'Pérez',
                'password' => 'password123',
                'phone' => '+34 600 123 456',
            ]);

            $this->info('Registration data prepared:');
            $this->table(
                ['Field', 'Value'],
                [
                    ['Business Name', $registrationData->businessName],
                    ['Business Type', $registrationData->businessType],
                    ['Subdomain', $registrationData->subdomain],
                    ['Admin Email', $registrationData->adminEmail],
                    ['Admin Name', $registrationData->adminFirstName . ' ' . $registrationData->adminLastName],
                ]
            );

            // Execute registration
            $registerService = app(RegisterTenantService::class);
            $tenant = $registerService->execute($registrationData);

            $this->info('✅ Tenant registered successfully!');
            $this->info("Tenant ID: {$tenant->id}");
            $this->info("Business Name: {$tenant->business_name}");
            $this->info("Subdomain: {$tenant->subdomain}.reasy.com");
            $this->info("Status: {$tenant->status}");
            $this->info("Trial ends: {$tenant->trial_ends_at}");
        } catch (\Exception $e) {
            $this->error('❌ Registration failed: ' . $e->getMessage());
            $this->error('Stack trace: ' . $e->getTraceAsString());
        }
    }
}
