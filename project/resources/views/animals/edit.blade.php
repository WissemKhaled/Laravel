@extends('layouts.animalshop')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container">
        <form action="{{ route('update', $animal->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label >Nom</label>
                <input type="text" name="name" value="{{$animal->name}}" class="form-control">
            </div>

            <div class="form-group">
                <label >Description</label>
                <input type="text" name="description" class="form-control"  value="{{$animal->description}}">
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
                <input type="number" name="age" class="form-control" value="{{$animal->age}}">
            </div>
            <div class="form-group">
                <label >Poid (en kg)</label>
                <input type="number" name="pound" class="form-control" value="{{$animal->pound}}">
            </div>
            <div class="form-group">
                <label >Hauteur (en cm)</label>
                <input type="number" name="height" class="form-control" value="{{$animal->height}}" >
            </div>
            <div class="form-group">
                <label >Race</label>
                <select name="race_id" class="form-control" >
                @foreach($races as $race)
                    @if($race->name == $animal->race->name)
                        <option selected value="{{$race->id }}">{{ $race->name }}</option>
                    @else
                        <option value="{{$race->id }}">{{ $race->name }}</option>
                    @endif
                @endforeach
                </select>
            </div>
            <button type="submit"  style="width: 25%;">Modifier</button>
        </form>
    </div>
@endsection 

