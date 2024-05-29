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
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->text('reason')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('vpu_object_id')->constrained();
            $table->foreignId('warehouse_id')->constrained();
            $table->foreignId('type_document_id')->constrained();
            $table->integer('count');
            $table->timestamp('operation_created');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operations');
    }
};
