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
        Schema::table('queue_number', function (Blueprint $table) {
            $table->string('case');
            $table->string('family_card');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('queue_number', function (Blueprint $table) {
            $table->dropColumn('case');
            $table->dropColumn('family_card');
        });
    }
};
