<?php

namespace App\Http\Controllers\Resource;

use App\Genre;
use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::latest('id')->paginate(6);
        return view('front.pages.genres.index', compact('genres'));
    }


    public function create()
    {
        return view('front.pages.genres.create');
    }


    public function store(GenreRequest $request)
    {
        Genre::create([
            'name' => $request->name
        ]);

        return redirect('/genres');
    }


    public function show(Genre $genre)
    {
        //
    }


    public function edit(Genre $genre)
    {
        return view('front.pages.genres.edit', compact('genre'));
    }


    public function update(GenreRequest $request, Genre $genre)
    {
        $genre->update([
            'name' => $request->name
        ]);

        return redirect('/genres');
    }


    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect('/genres');
    }
}
