<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public function deleteComment(Request $request) {
        Comment::where('id',$request->id)->delete();
    }
}
