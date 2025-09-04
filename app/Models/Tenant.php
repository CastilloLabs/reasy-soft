<?php

declare(strict_types=1);

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

final class Tenant extends BaseTenant implements TenantWithDatabase {
   use HasDatabase, HasDomains, HasUuids;

   protected $fillable = [
      'id',
      'name',
      'plan_id',
      'status',
      'settings',
      'limits',
   ];

   protected $casts = [
      'data' => 'array',
      'settings' => 'array',
      'limits' => 'array',
   ];

   public static function getCustomColumns(): array {
      return [
         'id',
         'name',
         'plan_id',
         'status',
         'settings',
         'limits',
      ];
   }

   /**
    * Get the business name for this tenant.
    */
   public function getName(): string {
      return $this->name ?? 'Unnamed Business';
   }

   /**
    * Check if tenant is active.
    */
   public function isActive(): bool {
      return $this->status === 'active';
   }

   /**
    * Get tenant limits.
    */
   public function getLimits(): array {
      return $this->limits ?? [];
   }

   /**
    * Get tenant settings.
    */
   public function getSettings(): array {
      return $this->settings ?? [];
   }
}
