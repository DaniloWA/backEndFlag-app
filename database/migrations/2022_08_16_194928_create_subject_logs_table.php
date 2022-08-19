<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_logs', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('slug');
            $table->unsignedBigInteger('student_log_id');
            $table->unsignedBigInteger('subject_id');

            $table->smallInteger('grades');
            $table->integer('frequency')->comment('frequency percentage');

            $table->timestamps();

            $table->unique(['student_log_id', 'subject_id']);

            $table->foreign('student_log_id')->references('id')->on('student_logs')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_logs');
    }
};
