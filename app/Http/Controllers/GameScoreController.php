<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GameScore;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



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
        $gamescore = DB::table('game_scores')
        ->join('users', 'game_scores.user_id', '=', 'users.id')
        ->selectRaw('MAX(game_scores.score) AS score, users.id, users.name, users.avatar')
        ->orderBy('game_scores.score', 'desc')
        ->orderBy('game_scores.created_at', 'desc')
        ->groupBy('users.id')
        ->limit(20)
        ->get();

        return response()->json(['data' => $gamescore]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $userId = Auth::user()->id;

        $gamescore = GameScore::create(
            [
                'user_id' => $userId,
                'score' => $request->score
            ]
        );

        if ($gamescore) {
            return _success($gamescore, $message = null, HTTP_SUCCESS);
        } else {
            return _error($gamescore, $message = null, HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
