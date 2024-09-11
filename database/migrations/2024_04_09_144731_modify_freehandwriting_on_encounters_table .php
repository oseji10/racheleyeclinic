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
        //     $table->dropColumn('free_handwriting_left');
        //     $table->dropColumn('free_handwriting_right');
        // });

        Schema::table('encounters', function (Blueprint $table) {
            $table->string('free_handwriting_left_front')->unique()->nullable();
            $table->string('free_handwriting_left_back')->unique()->nullable();
            $table->string('free_handwriting_right_front')->unique()->nullable();
            $table->string('free_handwriting_right_back')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('encounters', function (Blueprint $table) {
        //     $table->dropColumn('free_handwriting_left');
        //     $table->dropColumn('free_handwriting_right');
        // });
    }
};
