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
        Schema::table('encounters', function (Blueprint $table) {
            // $table->text('other_complaints_right')->nullable();
            // $table->text('other_complaints_left')->nullable();

            $table->text('near_add_right')->nullable();
            $table->text('near_add_left')->nullable();
            $table->text('oct_left')->nullable();
            $table->text('oct_right')->nullable();
            $table->text('ffa_left')->nullable();
            $table->text('ffa_right')->nullable();
            $table->text('fundus_photography_right')->nullable();
            $table->text('fundus_photography_left')->nullable();
            $table->text('pachymetry_right')->nullable();
            $table->text('pachymetry_left')->nullable();
            $table->text('cuft_static_right')->nullable();
            $table->text('cuft_static_left')->nullable();
            $table->text('cuft_kinetic_right')->nullable();
            $table->text('cuft_kinetic_left')->nullable();
            
            $table->text('pupil_distance')->nullable();
            $table->text('frame')->nullable();
            $table->text('lens_type')->nullable();
            $table->text('cost_of_lens')->nullable();
            $table->text('cost_of_frame')->nullable();
            $table->text('payment_status')->nullable();
            $table->text('payment_method')->nullable();
            
        
            // $table->dropColumn('other_complaints');
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
