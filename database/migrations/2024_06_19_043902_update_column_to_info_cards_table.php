<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('info_cards', function (Blueprint $table) {
            $table->dropForeign(['material_asset_id']);

            $table->foreign('material_asset_id')
                ->references('id')
                ->on('material_assets')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('info_cards', function (Blueprint $table) {
            $table->dropForeign(['material_asset_id']);
            $table->foreignId('material_asset_id')->constrained();
        });
    }
};
