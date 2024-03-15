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
        Schema::create('encounters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->nullable();  
            $table->unsignedBigInteger('doctor_id')->nullable();            
            $table->unsignedBigInteger('visual_acuity_far_presenting_left')->nullable(); 
            $table->unsignedBigInteger('visual_acuity_far_presenting_right')->nullable(); 
            $table->unsignedBigInteger('visual_acuity_far_pinhole_left')->nullable(); 
            $table->unsignedBigInteger('visual_acuity_far_pinhole_right')->nullable(); 
            $table->unsignedBigInteger('visual_acuity_far_best_corrected_left')->nullable(); 
            $table->unsignedBigInteger('visual_acuity_far_best_corrected_right')->nullable(); 
            $table->unsignedBigInteger('visual_acuity_near_left')->nullable(); 
            $table->unsignedBigInteger('visual_acuity_near_right')->nullable(); 
            
            $table->text('intraoccular_pressure')->nullable();
            $table->text('chief_complaint')->nullable();
            $table->text('detailed_history')->nullable();
            $table->text('findings')->nullable();
            $table->text('eyelid')->nullable();
            $table->text('conjunctiva')->nullable();
            $table->text('cornea')->nullable();
            $table->text('AC')->nullable();
            $table->text('iris')->nullable();
            $table->text('pupil')->nullable();
            $table->text('lens')->nullable();
            $table->text('vitreous')->nullable();
            $table->text('retina')->nullable();
            $table->text('other_findings')->nullable();
            $table->longText('free_handwriting_left')->nullable();
            $table->longText('free_handwriting_right')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('treatment_eyedrop')->nullable();
            $table->text('treatment_tablet')->nullable();
            $table->text('investigations_required')->nullable();
            $table->datetime('followup_appointment_date')->nullable();
            $table->text('new_developments')->nullable();
            $table->timestamps();


            $table->foreign('patient_id')->references('user_id')->on('patients')->onDelete('no action')->onUpdate('no action');
            $table->foreign('doctor_id')->references('user_id')->on('doctors')->onDelete('no action')->onUpdate('no action');

            $table->foreign('visual_acuity_far_presenting_left')->references('id')->on('visual_acuity')->onDelete('no action')->onUpdate('no action');
            $table->foreign('visual_acuity_far_presenting_right')->references('id')->on('visual_acuity')->onDelete('no action')->onUpdate('no action');
            $table->foreign('visual_acuity_far_pinhole_left')->references('id')->on('visual_acuity')->onDelete('no action')->onUpdate('no action');
            $table->foreign('visual_acuity_far_pinhole_right')->references('id')->on('visual_acuity')->onDelete('no action')->onUpdate('no action');
            $table->foreign('visual_acuity_far_best_corrected_left')->references('id')->on('visual_acuity')->onDelete('no action')->onUpdate('no action');
            $table->foreign('visual_acuity_far_best_corrected_right')->references('id')->on('visual_acuity')->onDelete('no action')->onUpdate('no action');
            $table->foreign('visual_acuity_near_left')->references('id')->on('visual_acuity')->onDelete('no action')->onUpdate('no action');
            $table->foreign('visual_acuity_near_right')->references('id')->on('visual_acuity')->onDelete('no action')->onUpdate('no action');

            
            // $table->unsignedInteger('bill_id');
            // $table->string('status')->nullable();
            // $table->text('meta')->nullable();
            // $table->boolean('is_manual_payment')->nullable();
            // $table->foreign('bill_id')->references('id')->on('bills')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
