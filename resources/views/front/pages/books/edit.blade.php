@extends('layouts.front')

@section('content')
    <h1>Edit book</h1>

    @isset($errors)
        @foreach($errors->all() as $error)
            <div class="alert alert-warning">
                {{ $error }}
            </div>
        @endforeach
    @endisset

    <hr />
    <div class="row">
        <div class="col-md-4">
            <form action="{{ url('books/'.$book->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="title" class="control-label">Title</label>
                    <input type="text" name="title" class="form-control" required value="{{ $book->title }}" />
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">Description</label>
                    <textarea name="description" class="form-control" required>{{ $book->description }}</textarea>
                </div>
                <div class="form-group">
                    <p>Genres:</p>
                    @foreach ($genres as $genre)
                        <label><input type="checkbox" name="genreIds[]" value="{{ $genre->id }}"
                        @if(count($book->genres->where('id', $genre->id)))
                            checked
                        @endif
                        /> {{ $genre->name }}</label>
                    @endforeach
                </div>
                <div class="form-group">
                    <img class="img-responsive" width="200" src="{{ asset($book->image) }}" alt="book_image" />
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" name="image" />
                    (max. 2MB)
                    <br/>
                </div>
                <div class="form-group">
                    <input type="submit" value="Edit" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>

    <div>
        <a href="#" onclick="history.back(-1)">Go Back</a>
    </div>
@endsection
