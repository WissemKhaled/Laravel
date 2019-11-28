@extends('layouts.animalshop')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li> {{ $error }} </li>
        @endforeach
    </ul>
</div>

@endif
    <div class="container">
        <form action="{{ route('storerace') }}" method="POST">
            @csrf
            <div class="form-group">
                <label >Nom de la Race à ajouter</label>
                <input type="text" name="name" class="form-control"  >
            </div>
            <div class="form-group">
                <label >Classification de la race à ajouter</label>
                <input type="text" name="classification" class="form-control"  >
            </div>
            <div class="form-group">
                <label >Temps de vie de la race à ajouter</label>
                <input type="number" name="lifetime" class="form-control"  >
            </div>
            <button type="submit" class="btn btn-success" style="width: 25%;">Ajouter</button>
        </form>
    </div>
@endsection 