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
        Schema::create('prescriptions_medicines', function (Blueprint $table) {
            $table->id();
            $table->integer('prescription_id')->unsigned()->nullable();
            $table->string('treatment_type')->nullable();
            $table->integer('medicine')->unsigned()->nullable();
            $table->string('dosage')->nullable();
            $table->string('day')->nullable();
            $table->string('time')->nullable();
            $table->string('comment')->nullable();
            $table->string('prescriptions_id')->nullable();
            $table->string('prescription_medicines_id')->unique()->nullable();

            $table->foreign('prescription_id')->on('prescriptions')->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->foreign('prescriptions_id')->on('prescriptions')->references('prescriptions_id')
                ->onDelete('cascade')
                ->onUpdate('cascade');

               
            $table->foreign('medicine')->on('medicines')->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::table('prescriptions', function (Blueprint $table) {
            $table->string('prescription_medicines_id')->nullable();
            $table->foreign('prescription_medicines_id')->references('prescription_medicines_id')->on('prescriptions_medicines')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::drop('prescriptions_medicines');
        // Schema::table('encounters', function (Blueprint $table) {
        //     $table->dropColumn('prescription_id');
        // });
    }
};
