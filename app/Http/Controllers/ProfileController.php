<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\QuizResult;

class ProfileController extends Controller
{
    public function index()
    {

         $username = Auth()->user()->username;


         $xpTotale = QuizResult::where('user_name', $username)->where('xp' ,'>',0)->get();
       $xp =   $xpTotale->sum('xp');
      

$questArtTotale = QuizResult::where('user_name', $username)->where('categorie','Art')->get();
  $countArtTotales =  $questArtTotale->count();
  $questArtCorrect = QuizResult::where('user_name', $username)->where('categorie','Art')->where('xp', '>', 0)->get();
  $countArtCorrect =  $questArtCorrect->count();
  if ($countArtTotales > 0) {
    $pourcArt = '(' . strval(round(($countArtCorrect / $countArtTotales) * 100)) . '%)';
  } else {
    $pourcArt = '(0%)';
  }
  $questGeoTotale = QuizResult::where('user_name', $username)->where('categorie', 'Geography')->get();
  $countGeoTotales =  $questGeoTotale->count();
  $questGeoCorrect = QuizResult::where('user_name', $username)->where('categorie', 'Geography')->where('xp', '>', 0)->get();
  $countGeoCorrect =  $questGeoCorrect->count();
  if ($countGeoTotales > 0) {
    $pourcGeo = '(' . strval(round(($countGeoCorrect / $countGeoTotales) * 100)) . '%)';
  } else {
    $pourcGeo = '(0%)';
  }
  $questHistTotale = QuizResult::where('user_name', $username)->where('categorie', 'History')->get();
  $countHistTotales =  $questHistTotale->count();
  $questHistCorrect = QuizResult::where('user_name', $username)->where('categorie', 'History')->where('xp', '>', 0)->get();
  $countHistCorrect =  $questHistCorrect->count();
  if ($countHistTotales > 0) {
    $pourcHist= '(' . strval(round(($countHistCorrect / $countHistTotales) * 100)) . '%)';
  } else {
    $pourcHist = '(0%)';
  }
  $questSciTotale = QuizResult::where('user_name', $username)->where('categorie', 'Science')->get();
  $countSciTotales =  $questSciTotale->count();
  $questSciCorrect = QuizResult::where('user_name', $username)->where('categorie', 'Science')->where('xp', '>', 0)->get();
  $countSciCorrect =  $questSciCorrect->count();
  if ($countSciTotales > 0) {
    $pourcSci = '(' . strval(round(($countSciCorrect / $countSciTotales) * 100)) . '%)';
  } else {
    $pourcSci = '(0%)';
  }
  $questSpoTotale = QuizResult::where('user_name', $username)->where('categorie', 'Sports')->get();
  $countSpoTotales =  $questSpoTotale->count();
  $questSpoCorrect = QuizResult::where('user_name', $username)->where('categorie', 'Sports')->where('xp', '>', 0)->get();
  $countSpoCorrect =  $questSpoCorrect->count();
  if ($countSpoTotales > 0) {
    $pourcSpo = '(' . strval(round(($countSpoCorrect / $countSpoTotales) * 100)) . '%)';
  } else {
    $pourcSpo = '(0%)';
  }
  $questTotale = QuizResult::where('user_name', $username)->get();
  $countTotale = $questTotale->count();
  $questCorrect = QuizResult::where('user_name', $username)->where('xp', '>', 0)->get();
  $countCorrect = $questCorrect->count();
  if ($xp < 1500) {
    $rang =  'Quiz Apprentice';
} elseif ($xp >= 1500 && $xp < 5000) {
    $rang = 'Average Quizer';
} elseif ($xp >= 5000 && $xp < 10000) {
    $rang = 'Epic Quizer';
} elseif ($xp >= 10000) {
    $rang = 'Quiz Master';
} else {
    $rang =  '';
}

$user = Auth::user(); 
$user->xp = $xp;
$user->art = strval($countArtCorrect).'/'. strval($countArtTotales);
$user->geography = strval($countGeoCorrect).'/'. strval($countGeoTotales);
$user->history = strval($countHistCorrect).'/'. strval($countHistTotales);
$user->science = strval($countSciCorrect).'/'. strval($countSciTotales);
$user->sports = strval($countSpoCorrect).'/'. strval($countSpoTotales);
$user->ratio = strval($countCorrect).'/'. strval($countTotale);

$user->save(); 


        return view('profile',compact('rang','countArtTotales','countArtCorrect','countGeoTotales','countGeoCorrect','countHistTotales',
        'countHistCorrect','countSciTotales','countSciCorrect','countSpoTotales','countSpoCorrect','pourcArt','pourcGeo','pourcHist',
        'pourcSci','pourcSpo','countTotale','countCorrect'));
    }

 
}
