<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizResultsTable extends Migration
{
    public function up()
    {
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('nomQuizz');
            $table->unsignedInteger('question_id');
            $table->string('questionText');
            $table->unsignedInteger('answer_id');
            $table->string('answer');
            $table->string('user_name');
            $table->string('categorie');

            $table->string('xp');
          
            $table->timestamps();
        });
        Schema::table('quiz_results', function (Blueprint $table) {
            $table->integer('numQuiz')->after('xp');
          
        });
    }
   
    public function down()
    {
        Schema::dropIfExists('quiz_results');
    }
}