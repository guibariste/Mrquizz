<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\QuizResult;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $touteCateg = true;
        $categUtilises = session('categUtilises', []);
        $erreur = '';
            
        session(['counter' => 0, 'quizName' => date('Y-m-d H:i:s')]);
    
        if (!Auth::check()) {
            return redirect('login')->withErrors(['Veuillez vous connecter pour démarrer le quizz']);
        }
    
        $question_id = session('question_id', null);
            
        if ($question_id) {
            // If there's a question in session, retrieve it and its answers
            $questions = Question::find($question_id);
            $answers = Answer::where('question_id', $question_id)->get();
        } else {
          
            // If there's no question in session, retrieve a new random question and its answers
            $questions = Question::inRandomOrder()->first();
            $categ = $questions->category;
            $categUtilises[] = $categ;
    
            $answers = Answer::where('question_id', $questions->id)->get();
             
              
            session(['question_id' => $questions->id, 'categUtilises' => $categUtilises]);
            $erreur = "Veuillez sélectionner une réponse";
           
        }
    
        return view('quizz', compact('questions', 'answers',  'erreur', 'categUtilises'));
    }

    public function store(Request $request)
    {
        $touteCateg = true;
        $erreur = '';
        $questions = Question::inRandomOrder()->first();
        $selectedAnswers = $request->input('selectedAnswers');
        $xpRecup = 0;
        $numQuizz = 1;
        $question_id = session('question_id', null);
    
        if ($selectedAnswers && count($selectedAnswers) > 0) {
            foreach ($selectedAnswers as $selectedAnswerId) {
                $counter = session('counter') + 1;
                session(['counter' => $counter]);
                
                // je vais faire un tableau ou je mets seulement les categories 
                // qui ont ete choisies et si toutes les categories sont dans le tableau je mets un booleen a true et je redirige la page results
                $categ = $questions->category;
                $categUtilises = session('categUtilises', []);
                $categUtilises[] = $categ;
    
                $categoriesRequises = ["Art", "History", "Geography", "Science", "Sports"];
                foreach ($categoriesRequises as $categorie) {
                    if (!in_array($categorie, $categUtilises)) {
                        $touteCateg = false;
                        break;
                    }
                }
    
              
                
        
                $questions = Question::inRandomOrder()->first();
                $answers = Answer::where('question_id', $questions->id)->get();
                $categUtilises = session('categUtilises', []);
                $categUtilises[] = $questions->category;
                session(['question_id' => $questions->id, 'categUtilises' => $categUtilises]);
                }
    
                $answer = Answer::find($selectedAnswerId);
                if ($answer) {
                    $question = Question::find($answer->question_id);
                    if ($answer->correct == 1) {
                        $xpRecup += $question->xp;
                    } else {
                        $xpRecup = 0;
                    }
                    QuizResult::create([
                        'nomQuizz'=>session('quizName'),
                        'question_id' => $answer->question_id,
                        'questionText' => $question->question,
                        'answer_id' => $answer->id,
                        'answer' => $answer->answer,
                        'categorie' => $question->category,
                        'user_name' => Auth::User()->username,
                        'xp' => $xpRecup,
                        'numQuiz' => $counter
                    ]);
                    if ($counter >= 10 && $touteCateg != false) {
                        session(['counter' => 0]);
                        session(['categUtilises' => []]);
                        return redirect('results');
                      
                        }
                  
                }
               
               
            }
    

    
            return view('quizz', compact('questions', 'answers', 'categUtilises'));
           
        } 
    }
    




