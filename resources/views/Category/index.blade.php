@extends('layouts.app')

@section('title' , 'category')
    
@section('content')
     
<h1> Creation de Category</h1>


<div class="container">

    <div class="row">
        <div class="col-md-10 offset-md-1 mt-5">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Liste des category</h4>
                    <a href="{{route('Category.create')}}" class="btn btn-success btn-sm">Créer une category</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
          @foreach ($Categories as $category)
              
       
             
        <tr>
                    <td>{{ $category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td><a class="btn btn-success btn-sm"  href="{{ route ('Category.edit', $category->id)}}">modifier</a>
                                        <form action="{{ route ('Category.destroy', $category->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')

                                        <button class="btn btn-danger btn-sm" href="{{ route ('Category.destroy', $category->id)}}">supprimer</button>
                                    </form></td>
       </tr>
         @endforeach
                </tbody>
                </table>

   

</div>






@endsection