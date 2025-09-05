<?php

declare(strict_types=1);

namespace TenantManagement\Domain\ValueObjects;

use InvalidArgumentException;

final readonly class TenantStatus {
   private string $value;

   public const PENDING_VERIFICATION = 'pending_verification';
   public const ACTIVE = 'active';
   public const SUSPENDED = 'suspended';
   public const CANCELLED = 'cancelled';

   private const VALID_STATUSES = [
      self::PENDING_VERIFICATION => 'Pendiente de Verificación',
      self::ACTIVE => 'Activo',
      self::SUSPENDED => 'Suspendido',
      self::CANCELLED => 'Cancelado'
   ];

   public function __construct(string $value) {
      $this->validate($value);
      $this->value = $value;
   }

   public static function pendingVerification(): self {
      return new self(self::PENDING_VERIFICATION);
   }

   public static function active(): self {
      return new self(self::ACTIVE);
   }

   public static function suspended(): self {
      return new self(self::SUSPENDED);
   }

   public static function cancelled(): self {
      return new self(self::CANCELLED);
   }

   public function value(): string {
      return $this->value;
   }

   public function label(): string {
      return self::VALID_STATUSES[$this->value] ?? 'Desconocido';
   }

   public function equals(self $other): bool {
      return $this->value === $other->value;
   }

   public function isPendingVerification(): bool {
      return $this->value === self::PENDING_VERIFICATION;
   }

   public function isActive(): bool {
      return $this->value === self::ACTIVE;
   }

   public function isSuspended(): bool {
      return $this->value === self::SUSPENDED;
   }

   public function isCancelled(): bool {
      return $this->value === self::CANCELLED;
   }

   private function validate(string $value): void {
      if (empty($value)) {
         throw new InvalidArgumentException('El estado del tenant no puede estar vacío.');
      }

      if (!array_key_exists($value, self::VALID_STATUSES)) {
         throw new InvalidArgumentException("El estado '{$value}' no es válido.");
      }
   }
}
