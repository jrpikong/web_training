<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_quizzes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('training_id', false, true);
            $table->string('time');
            $table->string('title');
            $table->text('sort_description');
            $table->timestamps();

            $table->foreign('training_id')->references('id')->on('trainings')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_quizzes');
    }
}
