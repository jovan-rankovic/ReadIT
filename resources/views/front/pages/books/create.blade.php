@extends('layouts.front')

@section('content')
    <h1>Add a book</h1>

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
            <form action="{{ url('/books') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title" class="control-label">Title</label>
                    <input type="text" name="title" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">Description</label>
                    <textarea name="description" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <p>Genres:</p>
                    @foreach ($genres as $genre)
                        <label><input type="checkbox" name="genreIds[]" value="{{ $genre->id }}" /> {{ $genre->name }}</label>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" required />
                    (max. 2MB)
                    <br/>
                </div>
                <div class="form-group">
                    <input type="submit" value="Create" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>

    <div>
        <a href="#" onclick="history.back(-1)">Go Back</a>
    </div>
@endsection
