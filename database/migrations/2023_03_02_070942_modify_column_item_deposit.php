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
        Schema::table('item_deposit', function (Blueprint $table) {
            $table->string('problem')->after('deposit_date')->comment('perkara');
            $table->string('family_card')->after('photo_visitor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_deposit', function (Blueprint $table) {
            $table->dropColumn('problem');
            $table->dropColumn('family_card');
        });
    }
};
