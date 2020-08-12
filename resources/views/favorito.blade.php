@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16 mb-20">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wide
            text-orange-500
            text-lg font-semibold">
            Filmes para Assistir Depois
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
            @foreach ($movies as $movie)
            <div class="mt-8">
                <img src="{{$movie['poster_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                <div class="mt-2">
                    <p class="text-lg mt-2 hover:text-gray-300 font-semibold">
                        {{$movie['title']}}
                    </p>
                    <div class="text-gray-400 text-sm">
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection
