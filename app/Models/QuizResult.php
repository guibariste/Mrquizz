<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    protected $table = 'quiz_results';
    protected $fillable = ['nomQuizz','question_id','questionText', 'answer_id','answer','user_name','categorie','xp','numQuiz'];
}