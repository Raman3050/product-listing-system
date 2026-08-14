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
        Schema::table('projects', function (Blueprint $table) {

            // Location Details
            $table->text('address')->nullable()
                ->after('description');

            $table->string('google_maps_url', 2048)->nullable()
                ->after('address');

            $table->json('nearby_locations')->nullable()
                ->after('google_maps_url');

            // Floor Plan
            $table->string('floor_plan_image')->nullable()
                ->after('brochure');

            $table->string('floor_plan_pdf')->nullable()
                ->after('floor_plan_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->dropColumn([
                'address',
                'google_maps_url',
                'nearby_locations',
                'floor_plan_image',
                'floor_plan_pdf',
            ]);
        });
    }
};
