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
        Schema::create('t_lesson', function (Blueprint $table) {
            $table->id('lesson_id');
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('course_id')->index();
            $table->string('lesson_title');
            $table->integer('progress_percentage')->default(0);
            $table->integer('lesson_score')->default(0);
            $table->string('modul_title');
            $table->text('modul_path')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('m_user');
            $table->foreign('course_id')->references('course_id')->on('m_course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 't_lesson');
    }
};
