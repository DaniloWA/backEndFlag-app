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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('departament_id');
            $table->uuid('uuid')->unique();
            $table->string('slug');

            $table->string('name');
            $table->integer('workload');
            $table->mediumText('description')->nullable();
            $table->integer('num_registered_students')->comment('Number of students registered in the subjects');

            $table->timestamps();

            $table->foreign('departament_id')->references('id')->on('departaments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
};
