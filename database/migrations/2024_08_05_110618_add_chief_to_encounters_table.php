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
            $table->text('other_complaints')->nullable();
            $table->text('diagnosis_left_eye')->nullable();
            $table->text('diagnosis_right_eye')->nullable();
            $table->text('external_investigation_required')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('encounters', function (Blueprint $table) {
            // $table->dropColumn('other_complaints');
            // $table->dropColumn('diagnosis_left_eye');
            // $table->dropColumn('diagnosis_right_eye');
            // $table->dropColumn('external_investigation_required');
        });
    }
};
