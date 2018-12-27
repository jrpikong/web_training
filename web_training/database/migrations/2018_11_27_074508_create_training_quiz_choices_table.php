<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingQuizChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_quiz_choices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id',false,true);
            $table->string('choice');
            $table->timestamps();
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
        Schema::dropIfExists('training_quiz_choices');
    }
}
