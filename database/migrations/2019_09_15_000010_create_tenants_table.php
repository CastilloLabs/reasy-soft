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

            // Custom columns for Reasy
            $table->string('name');
            $table->string('plan_id')->default('starter');
            $table->string('status')->default('active'); // active, suspended, cancelled
            $table->json('settings')->nullable();
            $table->json('limits')->nullable();

            $table->timestamps();
            $table->json('data')->nullable(); // Stancl default data column
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
