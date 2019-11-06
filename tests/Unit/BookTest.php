<?php

namespace Tests\Unit;

use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_genre_can_be_created()
    {
        Book::create([
            'title' => 'Test',
            'description' => 'Testing'
        ]);

        $this->assertCount(1, Book::all());
    }
}
