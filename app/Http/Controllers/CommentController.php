<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function getComments() {
        return Comment::addSelect(['user' => User::select('name')
        ->whereColumn('id', 'comments.user_id')])->get();
    }

    public function addComment(Request $request) {
        $userId = Auth::user()->id;
        $comment = Comment::create([
            'user_id' => $userId,
            'content' => $request->content,
        ]);
        $comment->save();
    }

    public function deleteComment($id) {
        $userId = Auth::user()->id;


        // dd($userId);
        Comment::find($id) && $deleted = DB::table('comments')
                        ->where(
                            'user_id','=' ,$userId
                            ) ->delete();

        return response()->json([
            'code' => 204,
            'message' => "Data has been deleted"
        ], status: 204);

    }
}
