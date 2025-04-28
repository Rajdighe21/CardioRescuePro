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



        Schema::create('patient_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('user_number');
            $table->string('name');
            $table->bigInteger('contact');
            $table->string('gender');
            $table->string('age');
            $table->unsignedBigInteger('first_payment');
            $table->unsignedBigInteger('due_payment');
            $table->date('date');
            $table->string('image')->nullable();
            $table->text('address');
            $table->text('patient_problem');
            $table->string('location');
            $table->string('status');
            $table->string('medication');
            $table->text('medication_list')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_registrations');
    }
};
