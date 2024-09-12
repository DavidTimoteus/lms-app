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
        Schema::create('t_submission', function (Blueprint $table) {
            $table->id('submission_id');
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('lessonDetail_id')->index();
            $table->dateTime('due_date');
            $table->time('time_remaining');
            $table->dateTime('last_modified');
            $table->text('submission_path')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('m_user');
            $table->foreign('lessonDetail_id')->references('lessonDetail_id')->on('t_lesson_detail');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 't_submission');
    }
};
