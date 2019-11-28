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
        <form action="{{ route('store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label >Nom</label>
                <input type="text" name="name" class="form-control"  placeholder="Hubert">
            </div>

            <div class="form-group">
                <label >Descritpion</label>
                <input type="textarea" name="description" class="form-control"  placeholder="un animal blanc....">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Sexe</label>
                <select name="sexe" class="form-control" id="exampleFormControlSelect1">
                    <option value="mâle">Mâle</option>
                    <option value="femelle">Femelle</option>
                    <option value="non identifié">Autre</option>

                </select>
            </div>
            <div class="form-group">
                <label >Age</label>
                <input type="number" name="age" class="form-control" >
            </div>
            <div class="form-group">
                <label >Poid</label>
                <input type="number" name="pound" class="form-control" >
            </div>
            <div class="form-group">
                <label >Hauteur</label>
                <input type="number" name="height" class="form-control"  >
            </div>
            <div class="form-group">
                <label >Race</label>
                <select name="race_id" class="form-control" >
                @foreach($races as $race)
                    <option value="{{$race->id }}">{{ $race->name }}</option>
                @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success" style="width: 25%;">Ajouter</button>
        </form>
    </div>
@endsection 