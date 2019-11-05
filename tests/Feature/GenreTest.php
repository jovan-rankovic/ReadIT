<?php

namespace Tests\Feature;

use App\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GenreTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware();
    }

    private function data()
    {
        return ['name' => 'Test'];
    }

    private function createGenre()
    {
        return $this->post('/genres', $this->data());
    }

    public function test_genre_index()
    {
        $this->get('/genres')
            ->assertOk();
    }

    public function test_genre_create()
    {
        $this->get('/genres/create')
            ->assertOk();
    }

    public function test_genre_store()
    {
        $this->createGenre()
            ->assertRedirect('/genres');

        $this->assertCount(1, Genre::all());
    }

    public function test_genre_edit()
    {
        $this->createGenre();

        $genre = Genre::first();

        $this->get('/genres/'.$genre->id.'/edit')
            ->assertOk();
    }

    public function test_genre_update()
    {
        $this->createGenre();

        $genre = Genre::first();

        $this->patch('/genres/'.$genre->id, ['name' => 'UpdatedTest'])
            ->assertRedirect('/genres');
    }

    public function test_genre_destroy()
    {
        $this->createGenre();

        $genre = Genre::first();

        $this->delete('/genres/'.$genre->id)
            ->assertRedirect('/genres');
    }
}
