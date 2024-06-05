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
        Schema::table('operations', function (Blueprint $table) {

            $table->dropForeign(['type_document_id']);
            $table->dropColumn('type_document_id');

            $table->addColumn('integer', 'quantity');

            $table->dropColumn('count');

            $table->addColumn('enum','type_movement',['in','out']);

            $table->dropForeign(['warehouse_id']);
            $table->dropColumn('warehouse_id');
            $table->dropForeign(['vpu_object_id']);
            $table->dropColumn('vpu_object_id');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('operations', function (Blueprint $table) {
            $table->foreignId('type_document_id')->constrained();
            $table->addColumn('integer','count');
            $table->dropColumn('quantity');

        });
    }
};
