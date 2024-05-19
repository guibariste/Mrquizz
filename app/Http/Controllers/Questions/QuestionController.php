<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Models\QuizResult;
// use App\Models\Question;
// use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $username = Auth()->user()->username;
        $quizName = $request->session()->get('quizName');
        $quizResults = QuizResult::where('nomQuizz', $quizName)->where('xp', '>', 0)->get();
        $count = $quizResults->count();
        $countArtTotale =   QuizResult::where('nomQuizz', $quizName)->where('categorie', 'Art')->count();
    
    $categArtCorrect = QuizResult::where('nomQuizz', $quizName)->where('categorie', 'Art')->where('xp', '>', 0)->get();
    $countArtCorrect =  $categArtCorrect->count();
    $countGeoTotale  = QuizResult::where('nomQuizz', $quizName)->where('categorie', 'Geography')->count();

    $categGeoCorrect = QuizResult::where('nomQuizz', $quizName)->where('categorie', 'Geography')->where('xp', '>', 0)->get();
    $countGeoCorrect =  $categGeoCorrect->count();
    $countHistTotale =   QuizResult::where('nomQuizz', $quizName)->where('categorie', 'History')->count();
    
    $categHistCorrect = QuizResult::where('nomQuizz', $quizName)->where('categorie', 'History')->where('xp', '>', 0)->get();
    $countHistCorrect =  $categHistCorrect->count();
    $countSciTotale =  QuizResult::where('nomQuizz', $quizName)->where('categorie', 'Science')->count();
  
    $categSciCorrect = QuizResult::where('nomQuizz', $quizName)->where('categorie', 'Science')->where('xp', '>', 0)->get();
    $countSciCorrect =  $categSciCorrect->count();
    $countSpoTotale =  QuizResult::where('nomQuizz', $quizName)->where('categorie', 'Sports')->count();
  
    $categSpoCorrect = QuizResult::where('nomQuizz', $quizName)->where('categorie', 'Sports')->where('xp', '>', 0)->get();
    $countSpoCorrect =  $categSpoCorrect->count();
   
   
   
    $questTotale = QuizResult::where('user_name', $username)->where('xp')->get();
    $countTotale = $questTotale->count();
    $questCorrect = QuizResult::where('user_name', $username)->where('xp', '>', 0)->get();
    $countCorrect = $questCorrect->count();
$total = $countArtTotale + $countGeoTotale + $countHistTotale + $countSciTotale + $countSpoTotale;

        return view('reponse', compact('count','countArtTotale','countArtCorrect','countGeoTotale',
        'countGeoCorrect','countHistTotale','countHistCorrect','countSciTotale','countSciCorrect','countSpoTotale','countSpoCorrect','total'));
       
       
       
       
       
       
       
      
    }




   
}
