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
        Schema::create('applicants', function (Blueprint $table) {
            $table->uuid('applicant_id')->primary();
            $table->string('name');
            $table->string('phone', 20);
            $table->enum('gender', ['Male', 'Female', 'Others'])->default(null)->nullable();
            $table->string('email');
            $table->text('profile_img');
            $table->text('permanent_address')->nullable();
            $table->text('present_address')->nullable();
            $table->text('cv')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
