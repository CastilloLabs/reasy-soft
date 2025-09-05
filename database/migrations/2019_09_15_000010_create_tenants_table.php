<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void {
        Schema::create('tenants', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // Business Information
            $table->string('business_name');
            $table->string('business_type');
            $table->string('subdomain')->unique();

            // Tenant Status & Lifecycle
            $table->string('status')->default('pending_verification'); // pending_verification, active, suspended, cancelled
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->string('suspension_reason')->nullable();

            // Subscription & Limits (for future use)
            $table->string('plan_id')->default('starter');
            $table->json('limits')->nullable();
            $table->json('settings')->nullable();

            $table->timestamps();
            $table->json('data')->nullable(); // Stancl default data column

            // Indexes
            $table->index(['status']);
            $table->index(['subdomain']);
            $table->index(['trial_ends_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void {
        Schema::dropIfExists('tenants');
    }
}
