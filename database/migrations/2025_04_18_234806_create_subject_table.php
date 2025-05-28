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
        Schema::create('subject', function (Blueprint $table) {
            $table->id('subject_id');
            $table->string('subject_name');
            $table->string('subject_code')->unique();
            $table->integer('units');
            $table->integer('midterm');
            $table->integer('finals');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('student_id')->on('student')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject');
    }
};
