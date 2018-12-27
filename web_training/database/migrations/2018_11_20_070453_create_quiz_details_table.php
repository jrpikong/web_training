<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quize_id',false,true);
            $table->text('questions')->nullable();
            $table->string('status');
            $table->string('answer')->nullable(); //kunci jawaban
            $table->string('choice_a');
            $table->string('type_of_choice_a');
            $table->string('choice_b');
            $table->string('type_of_choice_b');
            $table->string('choice_c');
            $table->string('type_of_choice_c');
            $table->string('choice_d');
            $table->string('type_of_choice_d');
            $table->timestamps();

            $table->foreign('quize_id')->references('id')->on('quizzes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_details');
    }
}
