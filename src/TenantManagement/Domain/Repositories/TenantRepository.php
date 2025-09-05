<?php

declare(strict_types=1);

namespace TenantManagement\Domain\Repositories;

use TenantManagement\Domain\Aggregates\Tenant;
use TenantManagement\Domain\ValueObjects\Subdomain;

interface TenantRepository {
   public function save(Tenant $tenant): void;

   public function findById(string $id): ?Tenant;

   public function findBySubdomain(Subdomain $subdomain): ?Tenant;

   public function existsSubdomain(Subdomain $subdomain): bool;

   public function findByEmail(string $email): ?Tenant;
}
