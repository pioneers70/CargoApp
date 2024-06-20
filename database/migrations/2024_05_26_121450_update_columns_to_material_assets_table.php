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
        Schema::table('material_assets', function (Blueprint $table) {
            $table->dropForeign(['asset_category_id']);
            $table->dropForeign(['measure_unit_id']);

            // Add new foreign keys with cascade options
            $table->foreign('asset_category_id')
                ->references('id')
                ->on('asset_categories')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('measure_unit_id')
                ->references('id')
                ->on('measure_units')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('material_assets', function (Blueprint $table) {
            $table->dropForeign(['asset_category_id']);
            $table->dropForeign(['measure_unit_id']);

            // Restore the original foreign keys
            $table->foreign('asset_category_id')
                ->references('id')
                ->on('asset_categories');

            $table->foreign('measure_unit_id')
                ->references('id')
                ->on('measure_units');
        });
    }
};
