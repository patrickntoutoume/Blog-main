@extends('layouts.app')

@section('title' , 'post')
    
@section('content')
     
<h1> Creation de Category</h1>


<div class="container">

    <div class="row">
        <div class="col-md-10 offset-md-1 mt-5">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Liste des posts</h4>
                    <a href="{{route('Post.create')}}" class="btn btn-success btn-sm">Créer une category</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Cover</th>
                    <th>Category</th>
                    <th>Action</th>
                    
                </thead>
                    
                    
                <tbody>
          @foreach ($posts as $post)
              
       
             
        <tr>
                    <td>{{ $post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td> <img src="{{asset($post->cover)}}" height="200px" width="200px" alt=""></td>
                    <td>{{$post->category->name }}</td>
                    <td><a class="btn btn-success btn-sm"  href="{{ route ('Post.edit', $post->id)}}">modifier</a>
                                        <form action="{{ route ('Post.destroy', $post->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')

                                        <button class="btn btn-danger btn-sm" href="{{ route ('Post.destroy', $post->id)}}">supprimer</button>
                                    </form></td>
       </tr>
         @endforeach
                </tbody>
                </table>

   

</div>






@endsection