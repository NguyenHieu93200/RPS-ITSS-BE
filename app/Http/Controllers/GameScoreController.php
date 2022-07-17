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
        $gamescore = DB::table('game_scores')->join('users', 'game_scores.user_id', '=', 'users.id')->get();
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

        $gamescore = GameScore::updateOrCreate(
            ['user_id' => $userId],
            ['score' => $request->score]
            
        );
            return response()->json([
                'code' => 201,
                'data' => $gamescore
            ], status: 201);
    }

}
