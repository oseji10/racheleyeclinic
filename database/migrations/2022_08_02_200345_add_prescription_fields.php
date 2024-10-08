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
        Schema::table('prescriptions', function (Blueprint $table) {
            $table->string('plus_rate', 100)->nullable();
            $table->string('temperature', 100)->nullable();
            $table->string('problem_description', 100)->nullable();
            $table->string('test', 100)->nullable();
            $table->string('advice', 100)->nullable();
            $table->string('next_visit_qty', 100)->nullable();
            $table->string('next_visit_time', 100)->nullable();
            $table->string('prescriptions_medicines_id')->nullable();

            $table->foreign('prescriptions_id')->on('prescriptions')->references('prescriptions_id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prescriptions', function (Blueprint $table) {
            //
        });
    }
};
