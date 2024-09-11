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
        Schema::create('visual_acuity', function (Blueprint $table) {
            $table->id();
            $table->string('acuity_group_id')->nullable();
            $table->string('acuity_group_name')->nullable();  
            $table->string('acuity_value')->nullable();
            $table->timestamps();

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
