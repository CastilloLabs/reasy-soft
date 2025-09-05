<?php

declare(strict_types=1);

namespace TenantManagement\Infrastructure\Repositories;

use TenantManagement\Domain\Aggregates\Tenant;
use TenantManagement\Domain\Repositories\TenantRepository;
use TenantManagement\Domain\ValueObjects\Subdomain;

final class EloquentTenantRepository implements TenantRepository {
   public function save(Tenant $tenant): void {
      $tenant->save();
   }

   public function findById(string $id): ?Tenant {
      return Tenant::find($id);
   }

   public function findBySubdomain(Subdomain $subdomain): ?Tenant {
      return Tenant::where('subdomain', $subdomain->value())->first();
   }

   public function existsSubdomain(Subdomain $subdomain): bool {
      return Tenant::where('subdomain', $subdomain->value())->exists();
   }

   public function findByEmail(string $email): ?Tenant {
      // Note: We'll need to join with users table or create a separate method
      // For now, let's assume we store admin email in tenant data
      return Tenant::whereHas('users', function ($query) use ($email) {
         $query->where('email', $email)->where('role', 'admin');
      })->first();
   }
}
