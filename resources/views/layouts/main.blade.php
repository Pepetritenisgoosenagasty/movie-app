<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <title>Movie App</title>
    @livewireStyles
</head>
<body class="font-sans bg-gray-900 text-white">
  <nav class="border-b border-gray-800">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
       <ul class="flex flex-col md:flex-row items-center">
         <li>
            <a href="{{ route('movie.index') }}" class="flex flex-col md:flex-row">
              <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white mr-2" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M16 8.38l4.55-2.27A1 1 0 0 1 22 7v10a1 1 0 0 1-1.45.9L16 15.61V17a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7c0-1.1.9-2 2-2h10a2 2 0 0 1 2 2v1.38zm0 2.24v2.76l4 2V8.62l-4 2zM14 17V7H4v10h10z"/></svg><span class="font-semibold">MovieApp</span>
            </a>
         </li>

             <li class="md:ml-16 mt-3 md:mt-0">
                <a href="{{ route('movie.index') }}" class="hover:text-gray-300">Movies</a>
             </li>
             <li class="md:ml-6 mt-4 md:mt-0" >
                <a href="#" class="hover:text-gray-300">TV Shows</a>
             </li>
             <li class="md:ml-6 mt-4 md:mt-0" >
                <a href="#" class="hover:text-gray-300">Actors</a>
             </li>

       </ul>
       <div class="flex flex-col md:flex-row items-center">
         <livewire:search-dropdown >
         <div class="ml-4 mt-3 md:mt-0">
            <a href="#" class="">
              <img src="/img/avatar.jpg" class="rounded-full w-8 h-8">
            </a>
         </div>
       </div>
    </div>
  </nav>
  @yield('content')
  @livewireScripts
</body>
</html>
