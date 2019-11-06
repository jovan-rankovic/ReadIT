<?php

namespace Tests\Unit;

use App\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GenreTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_genre_can_be_created()
    {
        Genre::create([
            'name' => 'Test',
        ]);

        $this->assertCount(1, Genre::all());
    }
}
