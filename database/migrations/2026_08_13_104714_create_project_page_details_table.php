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
        Schema::create('project_page_details', function (Blueprint $table) {

            $table->id();

            $table->foreignId('project_id')
                ->unique()
                ->constrained()
                ->cascadeOnDelete();

            // Banner Details
            $table->string('first_yellow_heading')->nullable();
            $table->string('second_yellow_heading')->nullable();
            $table->string('project_name')->nullable();
            $table->longText('description')->nullable();
            $table->string('amount_start')->nullable();

            // Statistics
            $table->string('stat_1_value')->nullable();
            $table->string('stat_1_type')->nullable();

            $table->string('stat_2_value')->nullable();
            $table->string('stat_2_type')->nullable();

            $table->string('stat_3_value')->nullable();
            $table->string('stat_3_type')->nullable();

            $table->string('stat_4_value')->nullable();
            $table->string('stat_4_type')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_page_details');
    }
};
