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
        <form action="{{ route('storeuser') }}" method="POST">
            @csrf
            <div class="form-group">
                <label >Nom de l'utilisateur</label>
                <input type="text" name="name" class="form-control"  >
            </div>
            <div class="form-group">
                <label >Email</label>
                <input type="email" name="email" class="form-control"  >
            </div>
            <div class="form-group">
                <label >Mot de passe </label>
                <input type="password" name="password" class="form-control"  >
            </div>
            <div class="form-group">
                <label >Role</label>
                <select name="role_id" class="form-control" >
                @foreach($roles as $role)
                    <option value="{{$role->id }}">{{ $role->name }}</option>
                @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success" style="width: 25%;">Ajouter</button>
        </form>
    </div>
@endsection 