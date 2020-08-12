@extends('layouts.main')

@section('content')
  <div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <div class="flex-none">
            <img src="{{ $movie['poster_path'] }}" alt="" class="w-64 lg:w-96 h-70">
        </div>
        <div class="md:ml-24">
            <h2 class="text-4xl font-semibold">{{ $movie['title'] }}</h2>
            <div class="flex items-center text-gray-400 text-sm mt-1">
                <span>
                   <svg class="fill-current text-orange-500 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                   </svg>
                </span>
                <span class="ml-1">{{ $movie['vote_average'] }}</span>
                <span class="mx-2">|</span>
                <span>{{ $movie['release_date'] }}</span>
                <span class="mx-2">|</span>
                <span>
                   {{  $movie['genres'] }} }}
                </span>
             </div>
             <p class="text-gray-300 mt-5">
                {{  $movie['overview'] }}
             </p>
             <div class="mt-12">
                 <h4 class="text-white font-semibold">
                     Featured Crew
                 </h4>
                 <div class="flex mt-4">
                    @foreach ($movie['crew'] as $crew)
                        <div class="mr-8">
                            <div>{{ $crew['name'] }}</div>
                            <div class="text-sm text-gray-400">
                                {{ $crew['job'] }}
                            </div>
                         </div>
                    @endforeach

                 </div>
                 <div x-data="{isOpen:false}">
                @if (count($movie['videos']['results'])  > 0)
                    <div class="mt-12">
                        <button
                            @click="isOpen=true"
                            class="inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current text-gray-900 h-6 w-6"><path d="M4 4l12 6-12 6z"/></svg>
                            </span>
                        <span>Play Thriller</span>
                        </button>
                    </div>
                @endif

                <div
                style="background-color: rgba(0, 0, 0, .5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                x-show.transition.opacity="isOpen"
            >
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end pr-4 pt-2">
                            <button
                                @click="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                                class="text-3xl leading-none hover:text-gray-300">&times;
                            </button>
                        </div>
                        <div class="modal-body px-8 py-8">
                            <div class="responsive-container overflow-hidden relative" style="padding-top:56.25%;">
                               <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" class="responsive-iframe absolute top-0 left-0 w-full h-full" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             </div>
            </div>
    </div>
  </div>
        </div>
    </div>
  </div>


  <div class="movie-cast border-b border-gray-800">
      <div class="container mx-auto px-4 py-16">
         <h2 class="text-4xl font-semibold">Casts</h2>
         <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5   sm:gap-8 gap-2">
            @foreach ($movie['cast'] as $cast)
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
            @endforeach
          </div>
      </div>
  </div>

  <div class="movie-images" x-data="{isOpen: false, image: ''}">
      <div class="container mx-auto px-4 py-16">
         <h2 class="text-4xl font-semibold">Images</h2>
         <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3  lg:grid-cols-3   sm:gap-8 gap-2">
            @foreach ($movie['images'] as $img)
                <div class="mt-8">
                    <a href="#"
                    @click.prevent="
                    isOpen = true
                     image='{{ 'https://image.tmdb.org/t/p/original/'.$img['file_path'] }}'">
                    <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$img['file_path'] }}" class="hover:opacity-75 transition ease-in-out duration-150 w-96">
                    </a>
                </div>
            @endforeach
          </div>
          <div
          style="background-color: rgba(0, 0, 0, .5);"
          class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
          x-show="isOpen"
      >
          <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
              <div class="bg-gray-900 rounded">
                  <div class="flex justify-end pr-4 pt-2">
                      <button
                          @click="isOpen = false"
                          @keydown.escape.window="isOpen = false"
                          class="text-3xl leading-none hover:text-gray-300">&times;
                      </button>
                  </div>
                  <div class="modal-body px-8 py-8">
                      <img :src="image" alt="poster">
                  </div>
              </div>
          </div>
      </div>
      </div>
  </div>
@endsection

