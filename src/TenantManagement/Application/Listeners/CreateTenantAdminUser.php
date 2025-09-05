<?php

declare(strict_types=1);

namespace TenantManagement\Application\Listeners;

use TenantManagement\Domain\Events\TenantWasCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Stancl\Tenancy\Facades\Tenancy;

final class CreateTenantAdminUser implements ShouldQueue {
   use InteractsWithQueue;

   public function handle(TenantWasCreated $event): void {
      // Switch to the tenant context to create the admin user
      tenancy()->initialize($event->tenantId);

      try {
         // Create the admin user within the tenant context
         $adminUser = User::create([
            'name' => $event->adminFirstName . ' ' . $event->adminLastName,
            'first_name' => $event->adminFirstName,
            'last_name' => $event->adminLastName,
            'email' => $event->adminEmail,
            'password' => Hash::make($event->adminPassword),
            'phone' => $event->adminPhone,
            'role' => 'admin',
            'email_verified_at' => null, // Will be verified via email
            'tenant_id' => $event->tenantId,
         ]);

         // Send verification email
         $this->sendVerificationEmail($adminUser, $event);
      } finally {
         // Always return to central context
         tenancy()->end();
      }
   }

   private function sendVerificationEmail(User $user, TenantWasCreated $event): void {
      // TODO: Implement email verification
      // For now, we'll just log it
      logger()->info('Tenant created - verification email should be sent', [
         'tenant_id' => $event->tenantId,
         'business_name' => $event->businessName,
         'admin_email' => $event->adminEmail,
         'subdomain' => $event->subdomain,
      ]);
   }
}
