<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\User;

class LeaderboardController extends Controller
{
    public function index()
    {
        $users = User::select('username', 'xp','ratio')
        ->orderByDesc('xp')
        ->get();
    return view('leaderboard', compact('users'));
    }
}
// Leaderboard
// The leaderboard page should display a table containing the top 10 players organized by XP amount. Each row of the table must have:

// username
// XP amount
// total correct answers
