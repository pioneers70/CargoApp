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
            $table->dropForeign(['warehouse_id']);
            $table->dropColumn('warehouse_id');

            $table->unsignedBigInteger('from_warehouse_id')->nullable()->after('user_id');
            $table->unsignedBigInteger('to_warehouse_id')->nullable()->after('from_warehouse_id');

            $table->foreign('from_warehouse_id')
                ->references('id')
                ->on('warehouses')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->foreign('to_warehouse_id')
                ->references('id')
                ->on('warehouses')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('operations', function (Blueprint $table) {
            $table->dropForeign(['from_warehouse_id']);
            $table->dropForeign(['to_warehouse_id']);
            $table->dropColumn(['from_warehouse_id', 'to_warehouse_id']);
        });
    }
};
