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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->uuid('feedback_id')->primary();
            $table->string('name');
            $table->string('designation');
            $table->string('company');
            $table->string('profile_img');
            $table->text('description')->nullable();
            $table->enum('rating', ['1', '2', '3', '4', '5'])->default(null)->nullable();
            $table->enum('aprroved', ['0', '1'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
