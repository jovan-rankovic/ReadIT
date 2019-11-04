<?php

namespace App\Http\Controllers\Resource;

use App\Book;
use App\BookGenre;
use App\Genre;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Mail\BookReservationEmail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    public function index()
    {
        //
    }


    public function create()
    {
        $genres = Genre::all();
        return view('front.pages.books.create', compact('genres'));
    }


    public function store(BookRequest $request)
    {
        $image = request('image');

        if($image)
        {
            if($image->isValid())
            {
                $imgFolder = 'img/book/';
                $imgName = time().rand().$image->getClientOriginalName();
                $image->move(public_path().'/'.$imgFolder, $imgName);

                $book = Book::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $imgFolder.$imgName
                ]);

                if(request('genreIds'))
                {
                    foreach (request('genreIds') as $genre)
                    {
                        BookGenre::create([
                            'book_id' => $book->id,
                            'genre_id' => $genre
                        ]);
                    }
                }
            }
        }
        else
        {
            $book = Book::create([
                'title' => $request->title,
                'description' => $request->description
            ]);

            if(request('genreIds'))
            {
                foreach (request('genreIds') as $genre)
                {
                    BookGenre::create([
                        'book_id' => $book->id,
                        'genre_id' => $genre
                    ]);
                }
            }
        }

        return redirect('/');
    }


    public function show(Book $book)
    {
        return view('front.pages.books.show', compact('book'));
    }


    public function edit(Book $book)
    {
        $genres = Genre::all();
        return view('front.pages.books.edit', compact('book', 'genres'));
    }


    public function update(BookRequest $request, Book $book)
    {
        $image = request('image');

        if($image)
        {
            if($image->isValid())
            {
                if(File::exists(public_path().'/'.$book->image))
                {
                    $defaultImage = public_path().'/img/book/default-cover.jpg';

                    if(public_path().'/'.$book->image != $defaultImage)
                    {
                        File::delete(public_path().'/'.$book->image);
                    }
                }

                $imgFolder = 'img/book/';
                $imgName = time().rand().$image->getClientOriginalName();
                $image->move(public_path().'/'.$imgFolder, $imgName);

                $book->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $imgFolder.$imgName
                ]);

                $book->genres()->detach();

                if(request('genreIds'))
                {
                    foreach (request('genreIds') as $genre)
                    {
                        BookGenre::create([
                            'book_id' => $book->id,
                            'genre_id' => $genre
                        ]);
                    }
                }
            }
        }
        else
        {
            $book->update([
                'title' => $request->title,
                'description' => $request->description
            ]);

            $book->genres()->detach();

            if(request('genreIds'))
            {
                foreach (request('genreIds') as $genre)
                {
                    BookGenre::create([
                        'book_id' => $book->id,
                        'genre_id' => $genre
                    ]);
                }
            }
        }

        return redirect('/');
    }


    public function destroy(Book $book)
    {
        if(File::exists(public_path().'/'.$book->image))
        {
            $defaultImage = public_path().'/img/book/default-cover.jpg';

            if(public_path().'/'.$book->image != $defaultImage)
            {
                File::delete(public_path().'/'.$book->image);
            }
        }

        $book->delete();

        return redirect('/');
    }


    public function reserve(Book $book)
    {
        $book->update([
            'reserved' => true,
            'user_id' => request('user_id')
        ]);

        $user = request('user');

        Mail::to('jovan@test.com')->send(new BookReservationEmail($book, $user));

        return redirect()->back();
    }


    public function returnBack(Book $book)
    {
        $book->update([
            'reserved' => false,
            'user_id' => null
        ]);

        return redirect()->back();
    }
}
