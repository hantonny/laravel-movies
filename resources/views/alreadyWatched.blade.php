@extends('layouts.main')

@section('content')
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
            Filmes já Assistidos
            </h2>
            <p>Legenda:</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16 mt-2">
                <p class="rounded inline-flex items-center"><img class="w-6 mr-2" src="/img/seta-para-tras.svg"/>
                - Voltar o filme
                </p>
                <p class="rounded inline-flex items-center"><img class="w-6 mr-2" src="/img/excluir.svg"/>
                - Excluir
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
            @foreach ($popularMovies as $movie)
            @endforeach
            
            @foreach ($movies as $moviesfavorited)
            @if(Auth::user()->id == $moviesfavorited->id_user && $moviesfavorited->status === 1)
           
            <div class="mt-8">
            
                <a href="{{route('movies.show', $moviesfavorited['id_movie'])}}">
                <img src="{{$moviesfavorited['poster_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                
                <div class="mt-2">
                    <p class="text-lg mt-2 hover:text-gray-300 font-semibold">
                        {{$moviesfavorited['title']}}
                    </p>
                    <div class="text-gray-400 text-sm">
                    </div>
                </div>
                <a href="{{route('editStatus', [$moviesfavorited->id])}}" class="mt-1 hover:bg-blue-400 transition ease-in-out duration-150 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center mt-2"><img class="w-8" src="/img/seta-para-tras.svg" alt="Já assistido"/></a>

                <a href="{{route('movies.destroy', [$moviesfavorited->id])}}" class="mt-1 hover:bg-red-400 transition ease-in-out duration-150 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center mt-2"><img class="w-8" src="/img/excluir.svg" alt="Excluir"/></a>
            </div>
            @endif
            @endforeach
        </div>
    </div>
@endsection
