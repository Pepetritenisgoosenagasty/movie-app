<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class ViewMoviesTest extends TestCase
{
    private function fakeSearchMovie() {
        return Http::response([
           'results' => [
            "popularity" => 50.418,
            "vote_count" => 4319,
            "video" => false,
            "poster_path" => "/jyw8VKYEiM1UDzPB7NsisUgBeJ8.jpg",
            "id" => 512200,
            "adult" => false,
            "backdrop_path" => "/zTxHf9iIOCqRbxvl8W5QYKrsMLq.jpg",
            "original_language" => "en",
            "original_title" => "Jumanji: The Next Level",
            "title" => "Jumanji: The Next Level",
            "vote_average" => 6.9,
            "overview" => "As the gang return to Jumanji to rescue one of their own, they discover that nothing is as they expect. The players will have to brave parts unknown and unexplored in order to escape the world’s most dangerous game. ",
            "release_date" => "2019-12-04"
           ]

        ]);
    }
    /** @test */
    public function the_dropdown_search_works_correctly() {
        Http::fake([
           'https://api.themoviedb.org/3/search/movie?query=humanji&api_key=9cb2a1c8a05c623b940e5aa7ac2cbc9c' => $this->fakeSearchMovie(),
        ]);

        Livewire::test('search-dropdown')->assertDontSee('jumanji')->set('search', 'jumanji')->assertSee('jumanji');
    }

}
