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
        Schema::create('home_page_unit_banners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('unit_id')->constrained()->cascadeOnDelete();
            $table->string('yellow_tagline')->nullable();
            $table->string('heading')->nullable();
            $table->text('description')->nullable();
            $table->string('button_text')->nullable();
            $table->string('background_image')->nullable();
            $table->string('card_title')->nullable();
            $table->string('card_category')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_area')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_unit_banners');
    }
};
