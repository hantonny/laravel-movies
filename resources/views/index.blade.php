@extends('layouts.main')

@section('content')
@if (session('warning'))
<div class="bg-indigo-900 text-center py-4 md:mt-5 md:mb-2 max-w-lg m-auto">
  <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Aviso</span>
    <span class="font-semibold mr-2 text-left flex-auto">{{session('warning')}}</span>
  </div>
</div>
@endif
    <div class="container mx-auto px-4 pt-5 mb-20">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wide
            text-orange-500
            text-lg font-semibold text-center">
            Filmes Populares
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                @foreach ($popularMovies as $movie)
                <div class="mt-8">
                    <a href="{{route('movies.show', $movie['id'])}}">
                    <img src="{{'https://image.tmdb.org/t/p/w500/'.$movie['poster_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="{{route('movies.show', $movie['id'])}}" class="text-lg mt-2 hover:text-gray-300 font-semibold">
                            {{$movie['title']}}
                        </a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star text-orange-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                            </svg>
                            <span class="ml-1">{{$movie['vote_average'] * 10 . '%'}}</span>
                            <span class="mx-2">|</span>
                            <span>{{\Carbon\Carbon::parse($movie['release_date'])->format('M d, Y')}}</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                            @foreach ($movie['genre_ids'] as $genre)
                                {{$genres->get($genre)}}@if(!$loop->last),@endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
