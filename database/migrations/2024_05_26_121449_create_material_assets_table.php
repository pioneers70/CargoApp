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
        Schema::create('material_assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('asset_category_id')->constrained();
            $table->foreignId('measure_unit_id')->constrained();
//            $table->foreignId('tag_id')->nullable()->constrained();
            $table->timestamps();



/*            $table->unsignedBigInteger('measure_unit_id');
            $table->foreign('measure_unit_id')->references('id')->on('measure_units');*/

/*            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');*/



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_assets');
    }
};
