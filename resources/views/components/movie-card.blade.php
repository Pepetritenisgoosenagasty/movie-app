<div class="mt-8">
    <a href="{{ route('movie.show', $movie['id']) }}">
       <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" class="h-64 hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="mt-2">
       <a href="{{ route('movie.show', $movie['id']) }}" class="text-lg hover:gray-300 mt-2">{{ $movie['title'] }}</a>
       <div class="flex items-center text-gray-400 text-sm mt-1">
          <span>
             <svg class="fill-current text-orange-500 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
             </svg>
          </span>
          <span class="ml-1">{{ $movie['vote_average'] * 10 .'%' }}</span>
          <span class="mx-2">|</span>
          <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
       </div>
       <div class="text-gray-400 text-sm">
          @foreach ($movie['genre_ids'] as $genre)
              {{ $genres->get($genre) }} @if (!$loop->last), @endif
          @endforeach
       </div>
    </div>
  </div>
