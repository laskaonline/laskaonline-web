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
        Schema::create('wartelsuspas', function (Blueprint $table) {
            $table->id();
            $table->string('name_wbp');
            $table->string('bin_wbp');
            $table->string('block_and_room');
            $table->integer('destination_phone');
            $table->string('relationship');
            $table->string('address');
            $table->string('information');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wartelsuspas');
    }
};
