<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GameScore;
use App\Models\User;

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
        $gamescore = GameScore::all();
        return response()->json(['data' => $gamescore]);
    }    
}
