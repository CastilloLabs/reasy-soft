<?php

declare(strict_types=1);

namespace TenantManagement\Domain\ValueObjects;

use InvalidArgumentException;

final readonly class BusinessType {
   private string $value;

   private const VALID_TYPES = [
      'health' => 'Salud y Bienestar',
      'beauty' => 'Belleza y Estética',
      'fitness' => 'Fitness y Deporte',
      'education' => 'Educación y Formación',
      'consulting' => 'Consultoría',
      'automotive' => 'Automoción',
      'other' => 'Otro'
   ];

   public function __construct(string $value) {
      $this->validate($value);
      $this->value = $value;
   }

   public static function from(string $value): self {
      return new self($value);
   }

   public function value(): string {
      return $this->value;
   }

   public function label(): string {
      return self::VALID_TYPES[$this->value] ?? 'Desconocido';
   }

   public function equals(self $other): bool {
      return $this->value === $other->value;
   }

   public static function validTypes(): array {
      return self::VALID_TYPES;
   }

   private function validate(string $value): void {
      if (empty($value)) {
         throw new InvalidArgumentException('El tipo de negocio no puede estar vacío.');
      }

      if (!array_key_exists($value, self::VALID_TYPES)) {
         throw new InvalidArgumentException("El tipo de negocio '{$value}' no es válido.");
      }
   }
}
