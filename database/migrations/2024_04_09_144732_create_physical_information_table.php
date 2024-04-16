<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::table('investigations', function (Blueprint $table) {
        Schema::create('physical_information', function (Blueprint $table) {

            $table->unsignedBigInteger('encounter_id')->nullable();
            $table->string('hbp');
            $table->string('diabetes');
            $table->string('pregnancy');
            $table->string('food');
            $table->string('drug_allergy');
            $table->string('current_medication');
            $table->timestamps();

            $table->foreign('encounter_id')->references('id')->on('encounters')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('bed_assigns', function (Blueprint $table) {
        //     $table->dropColumn('ipd_patient_department_id');
        // });
    }
};
