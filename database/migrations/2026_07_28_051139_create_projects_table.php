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
        Schema::create('projects', function (Blueprint $table) {

            $table->id();

            // Basic Information
            $table->string('name', 200);
            $table->string('slug')->unique();

            $table->foreignId('property_category_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('builder_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('location_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->longText('description')->nullable();

            // Project Details
            $table->string('rera_number')->nullable();

            $table->date('possession_date')->nullable();

            $table->decimal('project_area',10,2)->nullable();

            $table->string('area_unit')->nullable();

            $table->integer('total_towers')->nullable();

            $table->integer('total_units')->nullable();

            // Media
            $table->string('logo')->nullable();

            $table->string('featured_image')->nullable();

            $table->string('brochure')->nullable();

            // SEO
            $table->string('meta_title')->nullable();

            $table->text('meta_description')->nullable();

            $table->text('meta_keywords')->nullable();

            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
