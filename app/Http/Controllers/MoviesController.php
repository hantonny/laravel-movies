<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Movie;
use App\User;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular?language=pt-BR')
        ->json()['results'];

        $genresArray = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list?language=pt-BR')
        ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });

        //dump($popularMovies);

        return view('index', [
            'popularMovies' => $popularMovies,
            'genres' => $genres
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movie::all();

        $popularMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular?language=pt-BR')
        ->json()['results'];


        return view('favorite', [
            'popularMovies' => $popularMovies,
            'movies'=>$movies
        ]);
    }

    public function alreadyWatched()
    {
        $movies = Movie::all();

        $popularMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular?language=pt-BR')
        ->json()['results'];


        return view('alreadyWatched', [
            'popularMovies' => $popularMovies,
            'movies'=>$movies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->filled('title') &&
          $request->filled('poster_path')) {

            $title = $request->input('title');
            $poster_path = $request->input('poster_path');
            $id_user = $request->input('user');
            $id_movie = $request->input('id_movie');
            $id_movie_user = $request->input('id_movie_user');

            $data =$request->only(['title','poster_path', 'id_movie_user']);
            $validator = Validator::make($data,[
                'title'=>['required', 'string','max:200'],
                'poster_path'=>['required', 'string','max:500'],
                'id_movie_user'=>['required', 'unique:movie']
            ]);

            if($validator->fails()){
                return redirect()->route('movies.index')->with('warning' , 'Filme já adicionado em sua lista!');;
            }else{
                $movie = new Movie;
                $movie->title = $title;
                $movie->poster_path = $poster_path;
                $movie->id_user = $id_user;
                $movie->id_movie = $id_movie;
                $movie->id_movie_user = $id_movie_user;
                $movie->save();
            }
        }
        return redirect()->route('movies.create')->with('warning' , 'Filme adicionado com sucesso! :-)');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images&language=pt-BR')
        ->json();

        //dump($movie);

        return view('show', [
            'movie' => $movie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function editStatus($id)
    {
        $movie = Movie::find($id);

        if($movie && $movie->status === 0) {
            $movie->status = 1;
            $movie->save();
            return redirect()->route('movies.alreadyWatched');
        }else {
            $movie->status = 0;
            $movie->save();
            return redirect()->route('movies.create');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);

        if($movie){
            $movie->delete();
            return redirect()->route('movies.index')
            ->with('warning' , 'Filme excluido com sucesso! :-)');
        }
    }
}
