<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
   /**
    * Run the migrations.
    */
   public function up(): void {
      Schema::create('businesses', function (Blueprint $table) {
         $table->uuid('id')->primary();
         $table->string('name');
         $table->string('slug')->unique();
         $table->text('description')->nullable();
         $table->string('logo_url')->nullable();
         $table->string('website')->nullable();
         $table->string('phone')->nullable();
         $table->string('email')->nullable();
         $table->json('address')->nullable();
         $table->string('timezone')->default('UTC');
         $table->string('currency', 3)->default('USD');
         $table->json('settings')->nullable();
         $table->boolean('is_active')->default(true);
         $table->timestamps();
      });

      Schema::create('locations', function (Blueprint $table) {
         $table->uuid('id')->primary();
         $table->foreignUuid('business_id')->constrained()->cascadeOnDelete();
         $table->string('name');
         $table->json('address');
         $table->string('phone')->nullable();
         $table->string('email')->nullable();
         $table->string('timezone')->nullable();
         $table->json('settings')->nullable();
         $table->boolean('is_active')->default(true);
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void {
      Schema::dropIfExists('locations');
      Schema::dropIfExists('businesses');
   }
};
