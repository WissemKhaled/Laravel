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
                <th scope="col"> Classification </th>
                <th scope="col"> temps de vie de la race </th>                
                @if ($user->role->name == 'admin')
                    <th scope="col"> Modifier</th>
                    <th scope="col"></th>
                @endif
            </tr>
        </thead>
        <tbody>
        @foreach ($races as $race)
        <tr>
            <th>{{ $race->name }}</th>
            <td>{{ $race->classification }}</td>
            <td>{{ $race->lifetime }} ans</td>

            
                @if ($user->role->name == 'admin')
                    <td><a class="btn btn-info" href="{{ route('editrace', $race->id) }}"> Modifier<a>
                    <td>
                        <form action="{{ route('deleterace', $race->id) }}" method="POST">
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
