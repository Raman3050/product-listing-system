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
        Schema::create('project_page_detail_tenant', function (Blueprint $table) {

            $table->id();

            $table->foreignId('project_page_detail_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('tenant_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->integer('sort_order')
                ->default(0);

            $table->timestamps();

            $table->unique([
                'project_page_detail_id',
                'tenant_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_page_detail_tenant');
    }
};
