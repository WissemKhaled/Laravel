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
        <form action="{{ route('updateuser', $user->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label >Nom</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control">
            </div>

            <div class="form-group">
                <label >Email</label>
                <input type="text" name="email" class="form-control"  value="{{$user->email}}">
            </div>

            <div class="form-group">
                <label >Mot de Passe</label>
                <input type="password" name="password" class="form-control" >
            </div>
            <div class="form-group">
                <label >Role</label>
                <select name="role_id" class="form-control" >
                @foreach($roles as $role)
                    @if($role->name == $user->role->name)
                        <option selected value="{{$role->id }}">{{ $role->name }}</option>
                    @else
                        <option value="{{$role->id }}">{{ $role->name }}</option>
                    @endif
                @endforeach
                </select>
            </div>

            <button type="submit"  style="width: 25%;">Modifier</button>
        </form>
    </div>
@endsection 

    