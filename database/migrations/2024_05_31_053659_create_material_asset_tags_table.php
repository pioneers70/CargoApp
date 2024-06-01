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
        Schema::create('material_asset_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('material_asset_id')->constrained();
            $table->foreignId('tag_id')->constrained();
            $table->timestamps();
            // настроить каскадное удаление
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_asset_tags');
    }
};
