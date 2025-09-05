<?php

declare(strict_types=1);

namespace TenantManagement\Domain\Aggregates;

use TenantManagement\Domain\ValueObjects\BusinessType;
use TenantManagement\Domain\ValueObjects\Subdomain;
use TenantManagement\Domain\ValueObjects\TenantStatus;
use TenantManagement\Domain\Events\TenantWasCreated;
use TenantManagement\Domain\Events\TenantWasActivated;
use TenantManagement\Domain\Events\TenantWasSuspended;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\DatabaseConfig;

final class Tenant extends BaseTenant implements TenantWithDatabase {
   use HasUuids, HasDatabase;

   protected $fillable = [
      'id',
      'business_name',
      'business_type',
      'subdomain',
      'status',
      'email_verified_at',
      'trial_ends_at',
      'created_at',
      'updated_at'
   ];

   protected $casts = [
      'email_verified_at' => 'datetime',
      'trial_ends_at' => 'datetime',
      'created_at' => 'datetime',
      'updated_at' => 'datetime'
   ];   // Domain Logic

   public static function create(
      string $businessName,
      BusinessType $businessType,
      Subdomain $subdomain,
      string $adminEmail,
      string $adminFirstName,
      string $adminLastName,
      string $adminPassword,
      ?string $adminPhone = null
   ): self {
      $tenant = new self();
      $tenant->id = (string) \Illuminate\Support\Str::uuid();
      $tenant->business_name = trim($businessName);
      $tenant->business_type = $businessType->value();
      $tenant->subdomain = $subdomain->value();
      $tenant->status = TenantStatus::PENDING_VERIFICATION;
      $tenant->trial_ends_at = Carbon::now()->addDays(30);

      // Set domain data for tenancy package
      $tenant->setRelation('domains', collect([
         (object) ['domain' => $subdomain->value() . '.reasy.com']
      ]));

      return $tenant;
   }

   public function activate(): void {
      if (!$this->status()->isPendingVerification()) {
         throw new \DomainException('Solo se pueden activar tenants pendientes de verificación.');
      }

      $this->status = TenantStatus::ACTIVE;
      $this->email_verified_at = Carbon::now();

      event(new TenantWasActivated($this->id));
   }

   public function suspend(string $reason): void {
      if (!$this->status()->isActive()) {
         throw new \DomainException('Solo se pueden suspender tenants activos.');
      }

      $this->status = TenantStatus::SUSPENDED;
      $this->suspension_reason = $reason;

      event(new TenantWasSuspended($this->id, $reason));
   }

   public function cancel(): void {
      $this->status = TenantStatus::CANCELLED;
   }

   public function extendTrial(int $days): void {
      $this->trial_ends_at = $this->trial_ends_at->addDays($days);
   }

   public function isOnTrial(): bool {
      return $this->trial_ends_at && $this->trial_ends_at->isFuture();
   }

   public function trialDaysRemaining(): int {
      if (!$this->isOnTrial()) {
         return 0;
      }

      return $this->trial_ends_at->diffInDays(Carbon::now());
   }

   // Value Objects

   public function subdomain(): Subdomain {
      return Subdomain::from($this->subdomain);
   }

   public function businessType(): BusinessType {
      return BusinessType::from($this->business_type);
   }

   public function status(): TenantStatus {
      return new TenantStatus($this->status);
   }

   // Relationships

   public function users(): HasMany {
      return $this->hasMany(\App\Models\User::class);
   }

   public function adminUser(): ?\App\Models\User {
      return $this->users()->where('role', 'admin')->first();
   }

   // Scopes

   public function scopeActive($query) {
      return $query->where('status', TenantStatus::ACTIVE);
   }

   public function scopePendingVerification($query) {
      return $query->where('status', TenantStatus::PENDING_VERIFICATION);
   }

   public function scopeOnTrial($query) {
      return $query->where('trial_ends_at', '>', Carbon::now());
   }

   // Tenancy package methods

   public static function getCustomColumns(): array {
      return [
         'id',
         'business_name',
         'business_type',
         'subdomain',
         'status',
         'email_verified_at',
         'trial_ends_at'
      ];
   }

   public function getTenantKeyName(): string {
      return 'id';
   }

   public function getTenantKey() {
      return $this->getAttribute($this->getTenantKeyName());
   }

   public function database(): DatabaseConfig {
      // DatabaseConfig::$passwordGenerator = fn() => bin2hex(random_bytes(16));
      // DatabaseConfig::$databaseNameGenerator = 'tenant_' . $this->id;
      // DatabaseConfig::$usernameGenerator = fn() => 'tenant_' . $this->id;
      return new DatabaseConfig($this);
   }
}
