@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 my-5">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5>Créer un article</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('Category.update',$category->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

        

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success">Modifier un article</button>
                            <a href="{{ route('Category.index') }}" class="btn btn-secondary">Retour</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection