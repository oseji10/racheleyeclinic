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
        // Schema::table('prescriptions', function (Blueprint $table) {
        //     $table->string('prescription_id')->unique()->nullable();

           
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
