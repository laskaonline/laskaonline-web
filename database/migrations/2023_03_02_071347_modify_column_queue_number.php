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
            $table->string('problem')->after('date_deposit')->comment('perkara');
            $table->string('family_card')->after('photo_visitor');
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
