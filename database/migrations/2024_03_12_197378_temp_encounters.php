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
        Schema::create('temporary_encounters', function (Blueprint $table) {
            $table->id();
            $table->string('temporary_id')->nullable();  
            $table->unsignedBigInteger('patient_id')->nullable();  
            $table->unsignedBigInteger('doctor_id')->nullable();           
          
            $table->timestamps();


            $table->foreign('patient_id')->references('user_id')->on('patients')->onDelete('no action')->onUpdate('no action');
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
    
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
