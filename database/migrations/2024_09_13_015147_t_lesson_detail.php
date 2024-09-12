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
        Schema::create('t_lesson_detail', function (Blueprint $table) {
            $table->id('lessonDetail_id');
            $table->unsignedBigInteger('lesson_id')->index();
            $table->string('topic_title');
            $table->integer('topic_duration');
            $table->string('modul_title');
            $table->string('modul_status');
            $table->text('modul_path')->nullable();
            $table->timestamps();

            $table->foreign('lesson_id')->references('lesson_id')->on('t_lesson');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 't_lesson_detail');
    }
};
