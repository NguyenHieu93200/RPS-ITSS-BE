<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    public function getComments() {
        return Comment::addSelect(['user' => User::all()
        ->whereColumn('id', 'comment.user_id')])->get();
    }

    public function addComment(Request $request) {
        $comment = Comment::create([
            'user_id' => $request->user_id,
            'content' => $request->content,
        ]);
        $comment->save();
    }

    public function deleteComment(Request $request) {
        $comment = Comment::where('id',$request->id)->delete();
    }
}
