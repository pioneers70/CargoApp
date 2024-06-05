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
        Schema::table('operations', function (Blueprint $table) {
            $table->foreignId('warehouse_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('material_asset_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('type_movement',['in','out']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('operations', function (Blueprint $table) {

        });
    }
};
