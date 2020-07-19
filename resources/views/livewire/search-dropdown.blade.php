<div class="relative mt-3 md:mt-0">
    <input wire:model.debounce.500ms="search" type="text" class="bg-gray-800 rounded-lg w-64 px-4 py-1 focus:ouline-none focus:shadow-outline pl-8 text-sm" placeholder="Search...">
    <div class="absolute top-0">
       <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-500 w-4 mt-2 ml-2" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"/></svg>
    </div>
    <div class="absolute bg-gray-800 rounded w-64 mt-4">
        <ul>
            <li class="border-b border-gray-700">
                <a href="" class="block hover:bg-gray-800 px-3 py-3">{{ $search }}</a>
            </li>
            <li class="border-b border-gray-700">
                <a href="" class="block hover:bg-gray-800 px-3 py-3">Avengers</a>
            </li>
            <li class="border-b border-gray-700">
                <a href="" class="block hover:bg-gray-800 px-3 py-3">Avengers</a>
            </li>
        </ul>
    </div>
</div>
