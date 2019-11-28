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
        <form action="{{ route('updaterace', $race->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label >Nom</label>
                <input type="text" name="name" value="{{$race->name}}" class="form-control">
            </div>

            <div class="form-group">
                <label >Classification</label>
                <input type="text" name="classification" class="form-control"  value="{{$race->classification}}">
            </div>

            <div class="form-group">
                <label >Temps de vie</label>
                <input type="number" name="lifetime" class="form-control" value="{{$race->lifetime}}">
            </div>


            <button type="submit"  style="width: 25%;">Modifier</button>
        </form>
    </div>
@endsection 

    