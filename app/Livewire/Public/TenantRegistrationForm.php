<?php

declare(strict_types=1);

namespace App\Livewire\Public;

use TenantManagement\Application\DTOs\TenantRegistrationData;
use TenantManagement\Application\Services\RegisterTenantService;
use TenantManagement\Domain\ValueObjects\BusinessType;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use DomainException;
use InvalidArgumentException;
use Exception;

final class TenantRegistrationForm extends Component {
   // Business Information
   #[Validate('required|string|min:2|max:100')]
   public string $business_name = '';

   #[Validate('required|string')]
   public string $business_type = '';

   #[Validate('required|string|min:3|max:63|regex:/^[a-z0-9-]+$/|not_regex:/^-|-$|--/')]
   public string $subdomain = '';

   // Personal Information
   #[Validate('required|string|min:2|max:50')]
   public string $first_name = '';

   #[Validate('required|string|min:2|max:100')]
   public string $last_name = '';

   #[Validate('required|email|max:255')]
   public string $email = '';

   #[Validate('nullable|string|regex:/^[\+]?[\d\s\-\(\)]{7,15}$/')]
   public string $phone = '';

   #[Validate('required|string|min:8')]
   public string $password = '';

   #[Validate('required|accepted')]
   public bool $terms = false;

   // State
   public bool $isLoading = false;
   public ?string $errorMessage = null;
   public ?string $successMessage = null;

   public function __construct() {
      $this->resetValidation();
   }

   public function updatedBusinessName(): void {
      if (!empty($this->business_name) && empty($this->subdomain)) {
         $this->subdomain = $this->generateSubdomainFromBusinessName($this->business_name);
      }
   }

   public function updatedSubdomain(): void {
      $this->subdomain = $this->normalizeSubdomain($this->subdomain);
   }

   public function checkSubdomainAvailability(): bool {
      try {
         if (empty($this->subdomain)) {
            return false;
         }

         // Basic validation first
         if (!preg_match('/^[a-z0-9-]+$/', $this->subdomain)) {
            return false;
         }

         $registerService = app(RegisterTenantService::class);
         $repository = app(\TenantManagement\Domain\Repositories\TenantRepository::class);

         $subdomain = \TenantManagement\Domain\ValueObjects\Subdomain::from($this->subdomain);
         return !$repository->existsSubdomain($subdomain);
      } catch (Exception $e) {
         return false;
      }
   }

   public function register(): void {
      // Reset state
      $this->isLoading = true;
      $this->errorMessage = null;
      $this->successMessage = null;

      try {
         // Validate form
         $this->validate();

         // Prepare registration data
         $registrationData = TenantRegistrationData::from([
            'business_name' => $this->business_name,
            'business_type' => $this->business_type,
            'subdomain' => $this->subdomain,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'password' => $this->password,
            'phone' => $this->phone ?: null,
         ]);

         // Register tenant
         $registerService = app(RegisterTenantService::class);
         $tenant = $registerService->execute($registrationData);

         // Success
         $this->successMessage = '¡Cuenta creada exitosamente! Revisa tu email para verificar tu cuenta.';

         // Log success
         Log::info('Tenant registered successfully', [
            'tenant_id' => $tenant->id,
            'business_name' => $this->business_name,
            'subdomain' => $this->subdomain,
            'admin_email' => $this->email,
         ]);

         // Reset form
         $this->reset([
            'business_name',
            'business_type',
            'subdomain',
            'first_name',
            'last_name',
            'email',
            'phone',
            'password',
            'terms'
         ]);
      } catch (InvalidArgumentException $e) {
         $this->errorMessage = $e->getMessage();
         Log::warning('Tenant registration validation error', [
            'error' => $e->getMessage(),
            'data' => $this->only(['business_name', 'business_type', 'subdomain', 'email'])
         ]);
      } catch (DomainException $e) {
         $this->errorMessage = $e->getMessage();
         Log::warning('Tenant registration domain error', [
            'error' => $e->getMessage(),
            'data' => $this->only(['business_name', 'business_type', 'subdomain', 'email'])
         ]);
      } catch (Exception $e) {
         $this->errorMessage = 'Ocurrió un error inesperado. Por favor, inténtalo de nuevo.';
         Log::error('Tenant registration unexpected error', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
            'data' => $this->only(['business_name', 'business_type', 'subdomain', 'email'])
         ]);
      } finally {
         $this->isLoading = false;
      }
   }

   public function render() {
      return view('livewire.public.tenant-registration-form', [
         'businessTypes' => BusinessType::validTypes(),
         'subdomainAvailable' => !empty($this->subdomain) ? $this->checkSubdomainAvailability() : null
      ]);
   }

   private function generateSubdomainFromBusinessName(string $businessName): string {
      return $this->normalizeSubdomain($businessName);
   }

   private function normalizeSubdomain(string $value): string {
      $subdomain = strtolower(trim($value));
      $subdomain = preg_replace('/[^a-z0-9-\s]/', '', $subdomain);
      $subdomain = preg_replace('/\s+/', '-', $subdomain);
      $subdomain = preg_replace('/--+/', '-', $subdomain);
      $subdomain = trim($subdomain, '-');

      return $subdomain;
   }
}
