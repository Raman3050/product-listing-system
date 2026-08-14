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
    Schema::table('units', function (Blueprint $table) {

        $table->foreignId('tenant_id')
            ->nullable()
            ->after('property_type_id')
            ->constrained()
            ->nullOnDelete();

        $table->decimal('annual_roi', 5, 2)->nullable();
        $table->string('lease_status', 100)->nullable();
        $table->integer('lock_in_years')->nullable();
        $table->decimal('monthly_rental', 15, 2)->nullable();
        $table->decimal('minimum_rental', 15, 2)->nullable();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
