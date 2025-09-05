<?php

declare(strict_types=1);

namespace TenantManagement\Domain\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class TenantWasSuspended {
   use Dispatchable, InteractsWithSockets, SerializesModels;

   public function __construct(
      public readonly string $tenantId,
      public readonly string $reason
   ) {
   }
}
