<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingQuizQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_quiz_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quiz_id', false, true);
            $table->string('question');
            $table->string('correct_answer');
            $table->timestamps();

            $table->foreign('quiz_id')->references('id')->on('training_quizzes')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_quiz_questions');
    }
}
