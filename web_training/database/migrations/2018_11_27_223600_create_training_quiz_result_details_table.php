<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingQuizResultDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_quiz_result_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quiz_result_id', false, true);
            $table->integer('question_id', false, true);
            $table->string('answers');
            $table->string('correct');
            $table->timestamps();


            $table->foreign('quiz_result_id')->references('id')->on('training_quiz_results')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('training_quiz_questions')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_quiz_result_details');
    }
}
