<?php

namespace Tests\Feature;

use App\Book;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware();
    }

    private function data()
    {
        return [
            'title' => 'Test',
            'description' => 'Testing'
        ];
    }

    private function createBook()
    {
        return $this->post('/books', $this->data());
    }

    public function test_book_create()
    {
        $this->get('/books/create')
            ->assertOk();
    }

    public function test_book_store()
    {
        $this->createBook()
            ->assertRedirect('/');

        $this->assertCount(1, Book::all());
    }

    public function test_book_edit()
    {
        $this->createBook();

        $book = Book::first();

        $this->get('/books/'.$book->id.'/edit')
            ->assertOk();
    }

    public function test_book_update()
    {
        $this->createBook();

        $book = Book::first();

        $this->patch('/books/'.$book->id, [
            'title' => 'UpdatedTest',
            'description' => 'UpdatedTesting'
        ])->assertRedirect('/');
    }

    public function test_book_destroy()
    {
        $this->createBook();

        $book = Book::first();

        $this->delete('/books/'.$book->id)
            ->assertRedirect('/');
    }

    public function test_book_reserve()
    {
        Event::fake();

        $this->createBook();
        $this->seed('RoleTableSeeder');
        $user = factory(User::class)->create();

        $book = Book::first();

        $this->patch('/books/'.$book->id, [
            'user_id' => $user->id,
            'user' => $user->name
        ])->assertRedirect('/');
    }

    public function test_book_returnBack()
    {
        $this->createBook();

        $book = Book::first();

        $this->patch('/books/'.$book->id, [])->assertRedirect('/');
    }
}
