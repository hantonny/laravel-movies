@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16 mb-20">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wide
            text-orange-500
            text-lg font-semibold">
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
                        <a href="#" class="mt-1 bg-orange-300 hover:bg-red-400 transition ease-in-out duration-150 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill mr-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg>
                            <span class="text-sm uppercase">Favorito</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
