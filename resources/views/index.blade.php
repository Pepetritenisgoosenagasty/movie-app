@extends('layouts.main')

@section('content')
  <div class="container mx-auto px-4 pt-16">
     <div class="popular-movies">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Movies</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4  lg:grid-cols-5   sm:gap-8 gap-2">
          @foreach ($popularMovies as $movie)
            <x-movie-card :movie="$movie" :genres="$genres"/>
          @endforeach
        </div>
     </div>
     <div class="now-playing mt-20">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Now Playing</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4  lg:grid-cols-5   sm:gap-8 gap-2 w-54">
            @foreach ($nowPlayingMovies as $movie)
                <x-movie-card :movie="$movie" :genres="$genres"/>
            @endforeach
        </div>
     </div>
  </div>
@endsection
