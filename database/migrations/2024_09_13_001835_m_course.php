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
        Schema::create('m_course', function (Blueprint $table) {
            $table->id('course_id');
            $table->unsignedBigInteger('user_id')->index();
            $table->string('course_name');
            $table->text('description')->nullable();
            $table->string('certificate_path')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('m_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'm_course');
    }
};
