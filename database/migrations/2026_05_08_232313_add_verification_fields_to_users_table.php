<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_verified')->default(false);
            $table->string('company_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('license_number')->nullable();
            $table->string('verification_status')->default('unsubmitted'); // unsubmitted, pending, approved, rejected
            $table->text('verification_notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_verified', 'company_name', 'phone', 'license_number', 'verification_status', 'verification_notes']);
        });
    }
};
