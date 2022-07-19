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
        $userscore = GameScore::select('score', 'user_id')->orderBy('score', 'DESC')->with(['user' => function ($query) {
            $query->select('id', 'name', 'email', 'avatar');
        }])->get()->toArray();
        array_intersect_key($userscore, array_unique(array_column($userscore, 'user_id')));

        return _success($userscore, __('message.show_success'), HTTP_SUCCESS);
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
