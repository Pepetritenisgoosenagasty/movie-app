<div class="relative mt-3 md:mt-0">
    <input wire:model.debounce.500ms="search" type="text" class="bg-gray-800 rounded-lg w-64 px-4 py-2 focus:ouline-none focus:shadow-outline pl-8 text-sm" placeholder="Search...">
    <div class="absolute top-0">
       <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-500 w-4 mt-3 ml-2" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"/></svg>
    </div>
    <div wire:loading class="spinner top-0 right-0 mr-4 mt-4"></div>
     @if (strlen($search) >= 2)
        <div class="absolute bg-gray-800 rounded w-64 mt-4">
            @if ($searchResults->count() > 0)
            <ul>
                @foreach ($searchResults as $result)
                    <li class="border-b border-gray-700 hover:bg-gray-700">
                        <a href="{{ route('movie.show', $result['id']) }}" class="hover:bg-gray-700 flex items-center px-3 py-3">
                            @if ($result['poster_path'])
                                <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-8">
                            @else
                               <img src="https:\\via.placeholder.com/50x75" alt="poster" class="w-8">
                            @endif
                            <span class="ml-4">{{ $result['title'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
                @else
                <div class="px-3 py-3">No results for "{{ $search }}"</div>
            @endif
    </div>
     @endif
</div>
