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
                    <form action="{{route('Category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">

                            <select name="name" id="" required>
                                <option value="">Choississez une categorie</option>
                                <option value="photo">photo</option>
                                <option value="video">video</option>
                            </select>
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                      
        
        

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success">Créer un article</button>
                            <a href="{{ route('Category.index') }}" class="btn btn-secondary">Retour</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection