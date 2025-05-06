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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->date('assessment_date');
            $table->text('message');
            $table->enum('status', ['pending', 'completed'])->default('pending');


            $table->longText('diagnosis');
            $table->longText('treatment_protocol');
            $table->longText('current_status')->nullable();
            $table->longText('surgical_history');
            $table->longText('medical_history');
            $table->longText('posture')->nullable();
            $table->longText('range_of_motion')->nullable();

            // Cervical
            $table->string('cervical_flexion');
            $table->string('cervical_extension');
            $table->string('cervical_sideFlexion');
            $table->string('cervical_rotation');

            // Shoulder
            $table->string('shoulder_side');
            $table->string('shoulder_flexion');
            $table->string('shoulder_extension');
            $table->string('shoulder_adduction');
            $table->string('shoulder_abduction');

            // Elbow
            $table->string('elbow_side');
            $table->string('elbow_flexion');
            $table->string('elbow_extension');

            // Wrist
            $table->string('wrist_side');
            $table->string('wrist_flexion');
            $table->string('wrist_extension');
            $table->string('ulnar_deviation');
            $table->string('radial_deviation');

            // Hip
            $table->string('hip_side');
            $table->string('hip_flexion');
            $table->string('hip_extension');
            $table->string('hip_adduction');
            $table->string('hip_abduction');

            // Knee
            $table->string('knee_side');
            $table->string('knee_flexion');
            $table->string('knee_extension');

            // Ankle
            $table->string('ankle_side');
            $table->string('dorsiflexion');
            $table->string('plantarflexion');

            // Reflexes & Other
            $table->longText('mmt');
            $table->longText('met');
            $table->string('rt_upper_limb');
            $table->string('lt_upper_limb');
            $table->string('rt_lower_limb');
            $table->string('lt_lower_limb');
            $table->string('bisceps_reflexes');
            $table->string('triceps_reflex');
            $table->string('brachioradialis_reflexes');
            $table->string('knee_reflexes');
            $table->string('ankle_reflexes');
            $table->string('plantar_reflexes');
            $table->longText('balence_reflexes');
            $table->longText('special_test');

            // Muscle tone
            $table->string('pain_muscle_tone');
            $table->string('touch_muscle_tone');
            $table->string('temp_muscle_tone');
            $table->string('two_point_discrimination');
            $table->string('baragnosis_muscle_tone');
            $table->string('stregnosis_muscle_tone');

            // Others
            $table->longText('gait');
            $table->longText('limb');
            $table->longText('investigation')->nullable();
            $table->longText('mri')->nullable();
            $table->longText('x_ray')->nullable();

            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patient_registrations');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->unique(['patient_id', 'doctor_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
