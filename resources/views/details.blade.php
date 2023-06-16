@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card mt-5 shadow-sm">
                    <div class="card-body">
                        <div class="img-box mb-4">
                            @if ($post->category->name=="photo")
                            <img class="card-img-top" src="{{ asset ($post->cover )}}" alt="{{ $post->title }}">
                            @elseif($post->category->name=="video")
                            @endif
                            <img class="card-img-top" src="{{ asset ($post->cover )}}" alt="{{ $post->title }}">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="my-4">{{ $post->title }}</h1>
                            <div class="">View : {{ $post->views_count }}</div>
                        </div>
                        <p>
                            {{ $post->description  }}
                        </p>
        
         <div class="card-body">
            @foreach ($comments as $comment)
              <span><p style="color:blue"> {{$comment->user->name }} : </p>  {{$comment->comment}}</span> 
               <p>  {{$comment->created_at->diffForHumans()}} </p>
               @endforeach
         </div>
        
                     
                      <form action="{{route('add_comment')}}" method="post">
                        @csrf

                        <label for="comment">Commenter:</label>
                        <input type="text" name="comment" id="comment" placeholder="...">
                        
                        <input type="submit" class="btn btn-primay">

                      </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection