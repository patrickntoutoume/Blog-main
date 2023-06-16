<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
     public function add_comment(Request $request){
        $request->validate([
            'comment'=>'min:1'
        ]);

        $comment= new Comment();
        

        $comment->comment=$request->comment;

        $comment->user_id= Auth::id();

        $comment->save();

        return back();
     }
}
