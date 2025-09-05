<?php

declare(strict_types=1);

namespace TenantManagement\Application\DTOs;

final readonly class TenantRegistrationData {
   public function __construct(
      public string $businessName,
      public string $businessType,
      public string $subdomain,
      public string $adminEmail,
      public string $adminFirstName,
      public string $adminLastName,
      public string $adminPassword,
      public ?string $adminPhone = null
   ) {
   }

   public static function from(array $data): self {
      return new self(
         businessName: $data['business_name'] ?? '',
         businessType: $data['business_type'] ?? '',
         subdomain: $data['subdomain'] ?? '',
         adminEmail: $data['email'] ?? '',
         adminFirstName: $data['first_name'] ?? '',
         adminLastName: $data['last_name'] ?? '',
         adminPassword: $data['password'] ?? '',
         adminPhone: $data['phone'] ?? null
      );
   }

   public function toArray(): array {
      return [
         'business_name' => $this->businessName,
         'business_type' => $this->businessType,
         'subdomain' => $this->subdomain,
         'email' => $this->adminEmail,
         'first_name' => $this->adminFirstName,
         'last_name' => $this->adminLastName,
         'password' => $this->adminPassword,
         'phone' => $this->adminPhone,
      ];
   }
}
