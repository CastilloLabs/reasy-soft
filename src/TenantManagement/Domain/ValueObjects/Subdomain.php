<?php

declare(strict_types=1);

namespace TenantManagement\Domain\ValueObjects;

use InvalidArgumentException;

final readonly class Subdomain {
   private string $value;

   public function __construct(string $value) {
      $this->validate($value);
      $this->value = $this->normalize($value);
   }

   public static function from(string $value): self {
      return new self($value);
   }

   public function value(): string {
      return $this->value;
   }

   public function toString(): string {
      return $this->value;
   }

   public function equals(self $other): bool {
      return $this->value === $other->value;
   }

   private function validate(string $value): void {
      $value = trim($value);

      if (empty($value)) {
         throw new InvalidArgumentException('El subdominio no puede estar vacío.');
      }

      if (strlen($value) < 3) {
         throw new InvalidArgumentException('El subdominio debe tener al menos 3 caracteres.');
      }

      if (strlen($value) > 63) {
         throw new InvalidArgumentException('El subdominio no puede tener más de 63 caracteres.');
      }

      if (!preg_match('/^[a-z0-9-]+$/', strtolower($value))) {
         throw new InvalidArgumentException('El subdominio solo puede contener letras, números y guiones.');
      }

      if (str_starts_with($value, '-') || str_ends_with($value, '-')) {
         throw new InvalidArgumentException('El subdominio no puede empezar o terminar con guión.');
      }

      if (str_contains($value, '--')) {
         throw new InvalidArgumentException('El subdominio no puede contener guiones consecutivos.');
      }

      // Reserved subdomains
      $reserved = [
         'www',
         'api',
         'admin',
         'app',
         'mail',
         'email',
         'ftp',
         'blog',
         'support',
         'help',
         'docs',
         'cdn',
         'media',
         'static',
         'assets',
         'test',
         'demo',
         'dev',
         'staging',
         'prod',
         'production',
         'reasy',
         'castillo',
         'labs'
      ];

      if (in_array(strtolower($value), $reserved, true)) {
         throw new InvalidArgumentException("El subdominio '{$value}' está reservado y no se puede usar.");
      }
   }

   private function normalize(string $value): string {
      return strtolower(trim($value));
   }
}
