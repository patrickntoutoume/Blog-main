@extends('layouts.app')

@section('title', 'home')

@section('content')

    <h1> page index</h1>

    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4">
                    <div class="card"   >
                        @if($post->category->name =='photo')
                            <img class="card-img-top" src="{{ asset($post->cover) }}" alt="Card image cap">
                        @elseif($post->category->name =='video')
                                <video src="{{ asset($post->cover)}}" control autoplay loop muted></video>
                        
                        @endif
                        
                        <span> {{ $post->created_at->diffForHumans() }} vues: {{ $post->views_count }}</span>
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ \Str::limit($post->description, 10) }}</p>
                            <a href="{{route('detail_post', $post->id)}}" class="btn btn-primary">Voir plus</a>
                        </div>
                    </div>
                    <br><br>
                </div>
            @endforeach
        </div>

    </div>

@endsection


