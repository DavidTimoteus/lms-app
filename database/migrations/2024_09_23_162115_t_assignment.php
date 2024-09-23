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
        Schema::create('t_assignment', function (Blueprint $table) {
            $table->id('assignment_id');
            $table->unsignedBigInteger('course')->index();
            $table->string('title', '150');
            $table->dateTime('due_date');
            $table->time('time_remaining');
            $table->dateTime('last_modified');
            $table->text('submission_path')->nullable();
            $table->timestamps();

            $table->foreign('course')->references('course_id')->on('m_course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 't_assignment');
    }
};
