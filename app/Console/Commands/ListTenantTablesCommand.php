<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

final class ListTenantTablesCommand extends Command {
   /**
    * The name and signature of the console command.
    */
   protected $signature = 'tenancy:list-tables {tenant_id?}';

   /**
    * The console command description.
    */
   protected $description = 'List tables in a tenant database';

   /**
    * Execute the console command.
    */
   public function handle(): int {
      $tenantId = $this->argument('tenant_id');

      if (!$tenantId) {
         $tenant = Tenant::first();
         if (!$tenant) {
            $this->error('No tenants found. Create a tenant first.');
            return self::FAILURE;
         }
      } else {
         $tenant = Tenant::find($tenantId);
         if (!$tenant) {
            $this->error("Tenant {$tenantId} not found.");
            return self::FAILURE;
         }
      }

      $this->info("📋 Listing tables for tenant: {$tenant->name} ({$tenant->id})");

      try {
         tenancy()->initialize($tenant);

         $connection = DB::getDefaultConnection();
         $this->info("Connected to database: {$connection}");

         // Get database name from current connection
         $databaseName = DB::connection()->getDatabaseName();
         $this->info("Database name: {$databaseName}");

         // List all tables
         $tables = DB::select("
                SELECT table_name 
                FROM information_schema.tables 
                WHERE table_schema = 'public' 
                AND table_type = 'BASE TABLE'
                ORDER BY table_name
            ");

         if (empty($tables)) {
            $this->warn('No tables found in tenant database.');
         } else {
            $this->info('📊 Tables found:');
            foreach ($tables as $table) {
               $this->line("  • {$table->table_name}");
            }
         }

         tenancy()->end();

         return self::SUCCESS;
      } catch (\Exception $e) {
         $this->error('❌ Error: ' . $e->getMessage());

         return self::FAILURE;
      }
   }
}
