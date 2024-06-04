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
        Schema::table('vpu_objects', function (Blueprint $table) {
            $table->dropForeign(['system_id']);
            $table->dropColumn('system_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vpu_objects', function (Blueprint $table) {
            $table->foreignId('system_id')->constrained();
        });
    }
};
