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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('other_names')->nullable();
            $table->string('email', 100)->unique()->nullable();
            $table->string('password', 100)->nullable();;
            $table->string('designation', 100)->nullable();
            $table->string('phone', 100)->nullable();
            $table->integer('gender')->nullable();;
            $table->string('qualification', 100)->nullable();
            $table->string('blood_group', 100)->nullable();
            $table->date('dob')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('owner_id')->nullable();
            $table->string('owner_type', 100)->nullable();
            $table->boolean('status')->nullable();;
            $table->string('language', 100)->default('en');
            $table->rememberToken()->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
