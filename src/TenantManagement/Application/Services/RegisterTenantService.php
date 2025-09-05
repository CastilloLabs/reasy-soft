<?php

declare(strict_types=1);

namespace TenantManagement\Application\Services;

use TenantManagement\Application\DTOs\TenantRegistrationData;
use TenantManagement\Domain\Aggregates\Tenant;
use TenantManagement\Domain\Repositories\TenantRepository;
use TenantManagement\Domain\ValueObjects\BusinessType;
use TenantManagement\Domain\ValueObjects\Subdomain;
use TenantManagement\Domain\Events\TenantWasCreated;
use Illuminate\Database\DatabaseManager;
use InvalidArgumentException;
use DomainException;

final class RegisterTenantService {
   public function __construct(
      private readonly TenantRepository $tenantRepository,
      private readonly DatabaseManager $databaseManager
   ) {
   }

   public function execute(TenantRegistrationData $data): Tenant {
      return $this->databaseManager->transaction(function () use ($data) {
         // Validate input data
         $this->validateRegistrationData($data);

         // Create value objects
         $subdomain = Subdomain::from($data->subdomain);
         $businessType = BusinessType::from($data->businessType);

         // Check subdomain availability
         if ($this->tenantRepository->existsSubdomain($subdomain)) {
            throw new DomainException("El subdominio '{$subdomain->value()}' ya está en uso.");
         }

         // Check if email is already registered
         if ($this->tenantRepository->findByEmail($data->adminEmail)) {
            throw new DomainException("Ya existe una cuenta con el email '{$data->adminEmail}'.");
         }

         // Create tenant
         $tenant = Tenant::create(
            businessName: $data->businessName,
            businessType: $businessType,
            subdomain: $subdomain,
            adminEmail: $data->adminEmail,
            adminFirstName: $data->adminFirstName,
            adminLastName: $data->adminLastName,
            adminPassword: $data->adminPassword,
            adminPhone: $data->adminPhone
         );

         // Save tenant
         $this->tenantRepository->save($tenant);

         // Dispatch domain event
         event(new TenantWasCreated(
            tenantId: $tenant->id,
            businessName: $data->businessName,
            subdomain: $data->subdomain,
            adminEmail: $data->adminEmail,
            adminFirstName: $data->adminFirstName,
            adminLastName: $data->adminLastName,
            adminPassword: $data->adminPassword,
            adminPhone: $data->adminPhone
         ));

         return $tenant;
      });
   }

   private function validateRegistrationData(TenantRegistrationData $data): void {
      $errors = [];

      if (empty(trim($data->businessName))) {
         $errors[] = 'El nombre del negocio es requerido.';
      }

      if (strlen(trim($data->businessName)) < 2) {
         $errors[] = 'El nombre del negocio debe tener al menos 2 caracteres.';
      }

      if (empty(trim($data->adminFirstName))) {
         $errors[] = 'El nombre es requerido.';
      }

      if (empty(trim($data->adminLastName))) {
         $errors[] = 'Los apellidos son requeridos.';
      }

      if (empty(trim($data->adminEmail))) {
         $errors[] = 'El email es requerido.';
      }

      if (!filter_var($data->adminEmail, FILTER_VALIDATE_EMAIL)) {
         $errors[] = 'El email no tiene un formato válido.';
      }

      if (strlen($data->adminPassword) < 8) {
         $errors[] = 'La contraseña debe tener al menos 8 caracteres.';
      }

      if ($data->adminPhone && !preg_match('/^[\+]?[\d\s\-\(\)]{7,15}$/', $data->adminPhone)) {
         $errors[] = 'El teléfono no tiene un formato válido.';
      }

      if (!empty($errors)) {
         throw new InvalidArgumentException('Datos de registro inválidos: ' . implode(' ', $errors));
      }
   }
}
