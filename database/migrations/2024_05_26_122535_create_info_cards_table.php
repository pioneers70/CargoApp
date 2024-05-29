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
        Schema::create('info_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_asset_id');
            $table->foreign('material_asset_id')->references('id')->on('material_assets');
            $table->text('description');
            $table->tinyText('urlimg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_cards');
    }
};
