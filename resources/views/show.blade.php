@extends('layouts.main')

@section('content')
  <div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <div class="flex-none">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" alt="" class="w-64 lg:w-96 h-70">
        </div>
        <div class="md:ml-24">
            <h2 class="text-4xl font-semibold">{{ $movie['title'] }}</h2>
            <div class="flex items-center text-gray-400 text-sm mt-1">
                <span>
                   <svg class="fill-current text-orange-500 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                   </svg>
                </span>
                <span class="ml-1">{{ $movie['vote_average'] * 10 .'%' }}</span>
                <span class="mx-2">|</span>
                <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                <span class="mx-2">|</span>
                <span>
                    @foreach ($movie['genres'] as $genre)
                        {{ $genre['name']}} @if (!$loop->last), @endif
                    @endforeach
                </span>
             </div>
             <p class="text-gray-300 mt-5">
                {{  $movie['overview'] }}
             </p>
             <div class="mt-12">
                 <h4 class="text-white font-semibold">
                     Featured Cast
                 </h4>
                 <div class="flex mt-4">
                    @foreach ($movie['credits']['crew'] as $crew)
                        @if ($loop->index < 2)
                        <div class="mr-8">
                            <div>{{ $crew['name'] }}</div>
                            <div class="text-sm text-gray-400">
                                {{ $crew['job'] }}
                            </div>
                         </div>
                        @endif
                    @endforeach

                 </div>
                @if (count($movie['videos']['results'])  > 0)
                    <div class="mt-12">
                        <a href="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}" class="inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current text-gray-900 h-6 w-6"><path d="M4 4l12 6-12 6z"/></svg>
                            </span>
                        <span>Play Thriller</span>
                        </a>
                    </div>
                @endif
             </div>
        </div>
    </div>
  </div>


  <div class="movie-cast border-b border-gray-800">
      <div class="container mx-auto px-4 py-16">
         <h2 class="text-4xl font-semibold">Casts</h2>
         <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5   sm:gap-8 gap-2">
            @foreach ($movie['credits']['cast'] as $cast)
              @if ($loop->index < 10)
                <div class="mt-8">
                    <a href="#">
                    <img src="{{ 'https://image.tmdb.org/t/p/w300/'.$cast['profile_path'] }}" class="h-64 hover:opacity-75 transition ease-in-out duration-150 w-70">
                    </a>
                    <div class="mt-1">
                    <a href="#" class="text-lg hover:gray-300">{{ $cast['name'] }}</a>
                    <div class="flex items-center text-gray-400 text-sm">
                        <span>{{ $cast['character'] }}</span>
                    </div>
                    </div>
                </div>
                @endif
            @endforeach
          </div>
      </div>
  </div>

  <div class="movie-cast border-b border-gray-800">
      <div class="container mx-auto px-4 py-16">
         <h2 class="text-4xl font-semibold">Images</h2>
         <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3  lg:grid-cols-3   sm:gap-8 gap-2">
            @foreach ($movie['images']['backdrops'] as $img)
              @if ($loop->index < 9)
                <div class="mt-8">
                    <a href="#" target="_blank">
                    <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$img['file_path'] }}" class="hover:opacity-75 transition ease-in-out duration-150 w-96">
                    </a>
                </div>
              @endif
            @endforeach
          </div>
      </div>
  </div>
@endsection

