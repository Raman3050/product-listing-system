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
        Schema::create('units', function (Blueprint $table) {

            $table->id();

            $table->foreignId('project_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('property_type_id')
                ->constrained()
                ->cascadeOnDelete();

            // Basic Information
            $table->string('name');
            $table->string('slug')->unique();

            // Pricing
            $table->decimal('price', 15, 2)->nullable();
            $table->boolean('price_on_request')->default(false);
            $table->decimal('booking_amount', 15, 2)->nullable();

            // Area
            $table->decimal('carpet_area', 10, 2)->nullable();
            $table->decimal('builtup_area', 10, 2)->nullable();
            $table->decimal('super_area', 10, 2)->nullable();
            $table->string('area_unit')->nullable();

            // Specifications
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('balconies')->nullable();

            $table->integer('floor')->nullable();
            $table->integer('total_floors')->nullable();

            $table->string('facing')->nullable();

            // Description
            $table->longText('description')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            // Status
            $table->boolean('status')->default(true);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
