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
        Schema::create('queue_number_goods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('queue_number_id');
            $table->foreign('queue_number_id')->references('id')->on('queue_number');
            $table->string('name');
            $table->string('amount');
            $table->string('photo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queue_number_goods');
    }
};
