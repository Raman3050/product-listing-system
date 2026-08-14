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

            // Remove fields from the earlier abstract design
            $table->dropColumn([
                'booking_amount',
                'carpet_area',
                'builtup_area',
                'super_area',
                'bedrooms',
                'bathrooms',
                'balconies',
                'floor',
                'total_floors',
                'facing',
            ]);

            // Final unit size fields
            $table->decimal('floor_size', 10, 2)->nullable();
            $table->string('floor_size_unit', 50)->nullable();

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
