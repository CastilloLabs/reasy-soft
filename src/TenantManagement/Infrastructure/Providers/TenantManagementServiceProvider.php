<?php

declare(strict_types=1);

namespace TenantManagement\Infrastructure\Providers;

use TenantManagement\Application\Listeners\CreateTenantAdminUser;
use TenantManagement\Domain\Events\TenantWasCreated;
use TenantManagement\Domain\Repositories\TenantRepository;
use TenantManagement\Infrastructure\Repositories\EloquentTenantRepository;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

final class TenantManagementServiceProvider extends ServiceProvider {
   public function register(): void {
      // Repository bindings
      $this->app->bind(
         TenantRepository::class,
         EloquentTenantRepository::class
      );
   }

   public function boot(): void {
      // Event listeners
      Event::listen(
         TenantWasCreated::class,
         CreateTenantAdminUser::class
      );
   }
}
