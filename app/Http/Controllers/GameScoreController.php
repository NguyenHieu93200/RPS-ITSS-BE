<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GameScore;
use Illuminate\Support\Facades\DB;



class GameScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gamescore = DB::table('game_scores')->join('users', 'game_scores.user_id', '=', 'users.id')->get();
        return response()->json(['data' => $gamescore]);
    }    
}
