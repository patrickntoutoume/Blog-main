<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function dashbord(){
        $posts=Post::all();
       
        return view('dashbord', compact('posts'));
    }

    public function detail_post($id) {
        $post = Post::findOrFail($id);
        $post->increment('views_count');
        $comments=Comment::all();
        return view('details', compact('post','comments'));
    }
}
