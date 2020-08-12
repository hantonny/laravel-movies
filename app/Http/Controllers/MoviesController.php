<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Movie;

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

        $array = array('movies'=>$movies);

        return view('favorito', $array);
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

            $data =$request->only(['title','poster_path']);
            $validator = Validator::make($data,[
                'title'=>['required', 'string','max:200','unique:movie'],
                'poster_path'=>['required', 'string','max:500','unique:movie'],
            ]);

            if($validator->fails()){
                return redirect()->route('movies.index');
            }else{
                $movie = new Movie;
                $movie->title = $title;
                $movie->poster_path = $poster_path;
                $movie->save();
            }
        }
        return redirect()->route('movies.index');
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
        //
    }
}
