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
            
            // Left Eye
            $table->text('intraoccular_pressure_left')->nullable();
            $table->text('chief_complaint_left')->nullable();
            $table->text('detailed_history_left')->nullable();
            $table->text('findings_left')->nullable();
            $table->text('eyelid_left')->nullable();
            $table->text('conjunctiva_left')->nullable();
            $table->text('cornea_left')->nullable();
            $table->text('AC_left')->nullable();
            $table->text('iris_left')->nullable();
            $table->text('pupil_left')->nullable();
            $table->text('lens_left')->nullable();
            $table->text('vitreous_left')->nullable();
            $table->text('retina_left')->nullable();
            $table->text('other_findings_left')->nullable();


            // Right Eye
            $table->text('intraoccular_pressure_right')->nullable();
            $table->text('chief_complaint_right')->nullable();
            $table->text('detailed_history_right')->nullable();
            $table->text('findings_right')->nullable();
            $table->text('eyelid_right')->nullable();
            $table->text('conjunctiva_right')->nullable();
            $table->text('cornea_right')->nullable();
            $table->text('AC_right')->nullable();
            $table->text('iris_right')->nullable();
            $table->text('pupil_right')->nullable();
            $table->text('lens_right')->nullable();
            $table->text('vitreous_right')->nullable();
            $table->text('retina_right')->nullable();
            $table->text('other_findings_right')->nullable();

            $table->longText('free_handwriting_left_front')->nullable();
            $table->longText('free_handwriting_right_front')->nullable();
            $table->longText('free_handwriting_left_back')->nullable();
            $table->longText('free_handwriting_right_back')->nullable();

            $table->text('sphere_right')->nullable();
            $table->text('sphere_left')->nullable();
            $table->text('cylinder_right')->nullable();
            $table->text('cylinder_left')->nullable();
            $table->text('axis_right')->nullable();
            $table->text('axis_left')->nullable();
            $table->text('prism_right')->nullable();
            $table->text('prism_left')->nullable();

            $table->text('treatment_type')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('treatment_eyedrop')->nullable();
            $table->text('treatment_tablet')->nullable();
            $table->text('investigations_required')->nullable();
            $table->datetime('followup_appointment_date')->nullable();
            $table->text('new_developments')->nullable();
            $table->string('temporary_id')->nullable();
            $table->string('prescription_medicines_id')->nullable();
            $table->unsignedInteger('prescription_id')->nullable();
            $table->boolean('is_complete')->default(false); 

            $table->timestamps();


            $table->foreign('patient_id')->references('user_id')->on('patients')->onDelete('no action')->onUpdate('no action');
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');

            $table->foreign('visual_acuity_far_presenting_left')->references('id')->on('visual_acuity')->onDelete('no action')->onUpdate('no action');
            $table->foreign('visual_acuity_far_presenting_right')->references('id')->on('visual_acuity')->onDelete('no action')->onUpdate('no action');
            $table->foreign('visual_acuity_far_pinhole_left')->references('id')->on('visual_acuity')->onDelete('no action')->onUpdate('no action');
            $table->foreign('visual_acuity_far_pinhole_right')->references('id')->on('visual_acuity')->onDelete('no action')->onUpdate('no action');
            $table->foreign('visual_acuity_far_best_corrected_left')->references('id')->on('visual_acuity')->onDelete('no action')->onUpdate('no action');
            $table->foreign('visual_acuity_far_best_corrected_right')->references('id')->on('visual_acuity')->onDelete('no action')->onUpdate('no action');
            $table->foreign('visual_acuity_near_left')->references('id')->on('visual_acuity')->onDelete('no action')->onUpdate('no action');
            $table->foreign('visual_acuity_near_right')->references('id')->on('visual_acuity')->onDelete('no action')->onUpdate('no action');


                $table->foreign('prescription_medicines_id')->references('prescription_medicines_id')->on('prescriptions_medicines')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

                    $table->foreign('prescription_id')->references('id')->on('prescriptions')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            });

            // $table->unsignedInteger('bill_id');
            // $table->string('status')->nullable();
            // $table->text('meta')->nullable();
            // $table->boolean('is_manual_payment')->nullable();
            // $table->foreign('bill_id')->references('id')->on('bills')->onUpdate('cascade')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
