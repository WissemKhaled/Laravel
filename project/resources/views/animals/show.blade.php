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
                <th scope="col"> Description </th>
                <th scope="col"> Sexe </th>
                <th scope="col"> Age </th>
                <th scope="col"> Poids </th>
                <th scope="col"> Taille </th>
                <th scope="col"> Race </th>
                
                @if ($user->role->name == 'admin' )          
                    <th scope="col"> Modifier</th>
                    <th scope="col"></th>
                @endif
            </tr>
        </thead>
        <tbody>
        @foreach ($animals as $animal)
        <tr>
            <th>{{ $animal->name }}</th>
            <td>{{ $animal->description }}</td>
            <td>{{ $animal->sexe }}</td>
            <td>{{ $animal->age }} ans</td>
            <td>{{ $animal->pound }} kg</td>
            <td>{{ $animal->height }} cm</td>
            <td>{{ $animal->race->name }}</td>

                @if ($user->role->name == 'admin' )
                    
            <td><a class="btn btn-info" href="{{ route('edit', $animal->id) }}"> Modifier</a>
                    <td>
                        <form action="{{ route('delete', $animal->id) }}" method="POST">
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
