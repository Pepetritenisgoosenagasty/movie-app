<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search = '';
    public function render()
    {
        $searchResults = [];

       if(strlen($this->search) >= 2) {
        $searchResults = Http::get('https://api.themoviedb.org/3/search/movie?query='.$this->search.'&api_key=9cb2a1c8a05c623b940e5aa7ac2cbc9c')->json()['results'];
       }

        // dd($searchResults);

        return view('livewire.search-dropdown',[
            'searchResults' => collect($searchResults)->take(7),
        ]);
    }
}
