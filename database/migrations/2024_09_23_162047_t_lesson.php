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
            $table->unsignedBigInteger('course')->index();
            $table->string('lesson_title');
            $table->integer('progress_percentage')->default(0);
            $table->integer('lesson_score')->default(0);
            $table->text('modul_path')->nullable();
            $table->timestamps();

            $table->foreign('course')->references('course_id')->on('m_course');
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
