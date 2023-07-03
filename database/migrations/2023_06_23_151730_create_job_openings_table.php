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
       
        Schema::create('job_openings', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id');
            $table->string('poster')->default('ArieleAgency');
            $table->date('deadline');
            $table->string('title');
            $table->longText('about_job');
            $table->string('image');
            $table->string('salary');
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_openings');
    }
};
