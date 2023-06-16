<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $posts=Post::all();
        return view('Post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view ('Post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|min:3|max:255',
            'description'=>'required|min:3|max:255',
            'category_id'=>'required|exists:categories,id',
            'cover'=>"mimes:jpg,jpeg,png,mp4,mov,avi"

         ]);

         $post = new Post();
         $post->title=$request->title;
         $post->description=$request->description;
         $post->category_id= $request->category_id;
         if($request->hasfile('cover')){
            $post->cover = $request->file('cover')->store('images/posts');
         }
       
         $post->save();
          return redirect(route('Post.index'));
        
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
        $categories= Category::all();
        $post=Post::findOrFail($id);
        return view('post.update', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);
        return redirect(route('Post.index'));
    }
}
