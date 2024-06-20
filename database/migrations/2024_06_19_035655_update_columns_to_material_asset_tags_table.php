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
        Schema::table('material_asset_tags', function (Blueprint $table) {
            $table->dropForeign(['material_asset_id']);
            $table->dropForeign(['tag_id']);

            $table->foreign('material_asset_id')
                ->references('id')
                ->on('material_assets')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('material_asset_tags', function (Blueprint $table) {
            $table->dropForeign('material_asset_id');
            $table->dropForeign('tag_id');

            $table->foreignId('material_asset_id')->constrained();
            $table->foreignId('tag_id')->constrained();
        });
    }
};
