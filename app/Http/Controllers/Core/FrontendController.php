<?php

namespace App\Http\Controllers\Core;

use App\Book;
use App\Genre;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function home()
    {
        $books = Book::latest('id')->paginate(6);
        $genres = Genre::all();

        if(request('title'))
            $books = Book::where('title', 'like', '%'.request('title').'%')->paginate(6);

        if(request('genre'))
            $books = Genre::findOrFail(request('genre'))->books()->paginate(6);

        return view('front.pages.home', compact('books', 'genres'));
    }
}
