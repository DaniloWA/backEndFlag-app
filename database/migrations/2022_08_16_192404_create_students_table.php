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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('lesson_id');
            $table->uuid('uuid')->unique();
            $table->string('slug');

            $table->string("name");
            $table->string('last_name');
            $table->integer('nif');
            $table->boolean('status')->default(0);
            $table->enum('sex', ['M', 'F']);
            $table->string('father_full_name');
            $table->string('mother_full_name');
            $table->string('email');
            $table->string('phone_num');
            $table->string('country');
            $table->string('street_name');
            $table->string('postal_code');

            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
