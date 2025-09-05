<?php

declare(strict_types=1);

namespace TenantManagement\Domain\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class TenantWasCreated {
   use Dispatchable, InteractsWithSockets, SerializesModels;

   public function __construct(
      public readonly string $tenantId,
      public readonly string $businessName,
      public readonly string $subdomain,
      public readonly string $adminEmail,
      public readonly string $adminFirstName,
      public readonly string $adminLastName,
      public readonly string $adminPassword,
      public readonly ?string $adminPhone = null
   ) {
   }
}
