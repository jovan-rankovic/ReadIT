@extends('layouts.front')

@section('content')
    <h1>Create a genre</h1>

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
            <form action="{{ url('/genres') }}" method="POST">
                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" name="name" class="form-control" required />
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
