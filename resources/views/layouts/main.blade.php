<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MOVIES FLIX</title>
    <link rel="stylesheet" href="/css/main.css">
    <livewire:styles>
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">

                <li>
                    <a href="/">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-film" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0h8v6H4V1zm8 8H4v6h8V9zM1 1h2v2H1V1zm2 3H1v2h2V4zM1 7h2v2H1V7zm2 3H1v2h2v-2zm-2 3h2v2H1v-2zM15 1h-2v2h2V1zm-2 3h2v2h-2V4zm2 3h-2v2h2V7zm-2 3h2v2h-2v-2zm2 3h-2v2h2v-2z"/>
                        </svg>
                    </a>
                </li>
                @if(!Auth::user())
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{route('login')}}" class="hover:text-gray-300">Login</a>
                </li>
                @endif
                @if(!Auth::user())
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{route('register')}}" class="hover:text-gray-300">Registrar</a>
                </li>
                @endif
                @if(Auth::user())
                <li class="md:ml-6 mt-3 md:mt-0">
                    <p class="hover:text-gray-300">Seja bem vindo, {{Auth::user()->name}}!</p>
                </li>
                @endif
                @if(Auth::user())
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{route('movies.index')}}" class="hover:text-gray-300">Filmes</a>
                </li>
                @endif
                @if(Auth::user())
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{route('movies.create')}}">Assistir Depois</a>
                </li>
                @endif

            </ul>
            @if (Auth::user())
            <div class="flex flex-col md:flex-row items-center">
                <livewire:search-dropdown>
                <ul class="flex flex-col md:flex-row items-center ml-4">
                @if(Auth::user())
                <li class="nav-item dropdown">
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <p class="uppercase text-red-500 font-bold">{{ __('Sair') }}</p>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endif
                </ul>
            </div>
            @endif
        </div>
    </nav>
    <livewire:scripts>
    @yield('content')
</body>
</html>
