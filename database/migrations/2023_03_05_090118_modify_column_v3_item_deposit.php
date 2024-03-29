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
            $table->enum('state', ['0', '1'])->default('0')->after('family_card');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_deposit', function (Blueprint $table) {
            $table->dropColumn('state');
        });
    }
};
