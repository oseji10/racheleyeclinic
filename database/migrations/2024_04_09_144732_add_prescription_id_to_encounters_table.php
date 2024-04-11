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
        // Schema::table('encounters', function (Blueprint $table) {
        //     $table->string('prescriptions_id')->nullable();
        //     $table->string('prescription_medicines_id')->nullable();

        //     $table->foreign('prescriptions_id')->references('prescriptions_id')->on('prescriptions')
        //         ->onDelete('cascade')
        //         ->onUpdate('cascade');

                

        //     $table->foreign('prescription_medicines_id')->references('prescription_medicines_id')->on('prescriptions_medicines')
        //         ->onDelete('cascade')
        //         ->onUpdate('cascade');
        // });
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
