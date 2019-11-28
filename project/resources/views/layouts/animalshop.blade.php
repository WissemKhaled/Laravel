
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></head>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
    <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="/">Les Animaux en folie</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                      <ul class="navbar-nav mr-auto navbar_1">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('animals')}}" >Liste des animaux </a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('races')}}" >Liste des races </a>
                        </li>
                        @if(Auth::user() && Auth::user()->role->name == 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users')}}" >Liste des utilisateurs </a>
                            </li>
                        @endif
                        @endauth
                      </ul>
                      <ul class="navbar-nav mr-auto navbar_2">
                        @if(Auth::user() && Auth::user()->role->name == 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('create')}}" >Ajouter un animal </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('createrace')}}" >Ajouter une race </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('createuser')}}" >Ajouter un utilisateur </a>
                            </li>
                        @endif
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                      </ul>
                        {{-- <ul class="navbar-text">
                            <li>test</li>
                        </ul> --}}
                    </div>
                  </nav>
    </header>
        <div class="container container_style">
            @yield('content')
        </div>

        <section id="footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p>Mon footer est vraiment génial, mais il ne va malheureusement pas me servir.</p>
					<p class="h6">&copy All rights Reversed.<a class="text-green ml-2" href="#">Anto</a></p>
				</div>
				</hr>
			</div>	
		</div>
	</section>
	<!-- ./Footer -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
