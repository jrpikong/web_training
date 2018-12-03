<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultPersonalQuizDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_personal_quiz_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quiz_result_id',false,true);
            $table->integer('question_id', false, true);
            $table->string('answers');
            $table->string('type_of_choice');

            $table->timestamps();

            $table->foreign('quiz_result_id')->references('id')->on('result_personal_quizzes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('quiz_details')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('result_personal_quiz_details');
    }
}
