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
        Schema::create('employee_x_skills', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('skill_id');
            $table->foreign('employee_id')->references('employee_id')->on('employees');
            $table->foreign('skill_id')->references('skill_id')->on('skills');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_x_skills');
    }
};
