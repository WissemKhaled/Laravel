@extends('layouts.animalshop')
@section('content')

    @if(session('add'))
        <div class="alert alert-success"> {{session('add')}}</div>
    @elseif(session('modif'))
        <div class="alert alert-info"> {{session('modif')}}</div>
    @elseif(session('supp'))
        <div class="alert alert-warning"> {{session('supp')}}</div>
    @endif

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col"> Nom </th>
                <th scope="col"> Email </th>
                <th scope="col"> Role </th>            
                @if ($userUnique->role->name == 'admin')
                    <th scope="col"> Modifier</th>
                    <th scope="col"></th>
                @endif
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
        <tr>
            <th>{{ $user->name }}</th>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->name }}</td>

            
                @if ($userUnique->role->name == 'admin')
                    <td><a class="btn btn-info" href="{{ route('edituser', $user->id) }}"> Modifier<a>
                    <td>
                        <form action="{{ route('deleteuser', $user->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit">X</button>
                        </form>
                    </td>
                @endif

        </tr>
        @endforeach
        </tbody>
    </table>
    
    <script type="text/javascript">
        $('.toast').toast('show')
    </script>
@endsection
