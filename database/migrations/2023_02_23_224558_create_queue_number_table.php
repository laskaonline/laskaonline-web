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
        Schema::create('queue_number', function (Blueprint $table) {
            $table->id();
            $table->string('name_wbp');
            $table->string('case');
            $table->string('relationship');
            $table->date('date_deposit');
            $table->string('photo_visitor');
            $table->string('male_followers')->nullable();
            $table->string('female_followers')->nullable();
            $table->string('child_followers')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queue_number');
    }
};
