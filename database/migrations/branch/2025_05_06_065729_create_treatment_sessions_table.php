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
        Schema::create('treatment_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');

            $table->string('session_number');
            $table->date('session_date');
            $table->time('session_start_time')->nullable();
            $table->time('session_end_time')->nullable();

            $table->text('diagnosis');
            $table->text('treatment_protocol');
            $table->text('message');

            $table->string('video_before')->nullable();
            $table->string('video_after')->nullable();

            $table->text('patient_signature')->nullable();

            $table->enum('status', ['pending', 'completed'])->default('pending');

            $table->foreign('patient_id')->references('id')->on('patient_registrations')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatment_sessions');
    }
};
