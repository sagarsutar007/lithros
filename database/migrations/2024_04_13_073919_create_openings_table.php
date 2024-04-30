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
        Schema::create('openings', function (Blueprint $table) {
            $table->uuid('opening_id')->primary();
            $table->string('title');
            $table->enum('type', ['Full time', 'Part time'])->default(null)->nullable();
            $table->string('experience')->nullable();
            $table->string('education')->nullable();
            $table->text('skills')->nullable();
            $table->text('about')->nullable();
            $table->string('salary')->nullable();
            $table->text('location')->nullable();
            $table->string('working_days')->nullable();
            $table->string('working_hours')->nullable();
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->text('slug')->unique();
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('openings');
    }
};
