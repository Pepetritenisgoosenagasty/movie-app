<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $popularmovies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=9cb2a1c8a05c623b940e5aa7ac2cbc9c')->json()['results'];

       $nowPlayingMovies = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=9cb2a1c8a05c623b940e5aa7ac2cbc9c')->json()['results'];

       $genreArray = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=9cb2a1c8a05c623b940e5aa7ac2cbc9c')->json()['genres'];

       $genres = collect($genreArray)->mapWithKeys(function($genre) {
           return [$genre['id'] => $genre['name']];
       });

    //    dump( $nowPlayingMovies);
       return view('index', [
           'popularMovies' => $popularmovies,
           'nowPlayingMovies' => $nowPlayingMovies,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=9cb2a1c8a05c623b940e5aa7ac2cbc9c&append_to_response=credits,videos,images')->json();

        // dump($movie);
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
