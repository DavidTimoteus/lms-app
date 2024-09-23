<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_enrollment', function (Blueprint $table) {
            $table->id('enroll_id');
            $table->unsignedBigInteger('course')->index();
            $table->unsignedBigInteger('student')->index();
            $table->dateTime('date_enrolled');
            $table->timestamps();

            $table->foreign('course')->references('course_id')->on('m_course');
            $table->foreign('student')->references('user_id')->on('m_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 't_enrollment');
    }
};
