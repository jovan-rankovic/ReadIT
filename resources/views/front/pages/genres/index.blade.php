@extends('layouts.front')

@section('content')
    <h1>Genre list</h1>

    @isset($errors)
        @foreach($errors->all() as $error)
            <div class="alert alert-warning">
                {{ $error }}
            </div>
        @endforeach
    @endisset

    <p>
        <a href="{{ url('/genres/create') }}">Create New</a>
    </p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($genres as $genre)
                <tr>
                    <td>
                        {{ $genre->id }}
                    </td>
                    <td>
                        {{ $genre->name }}
                    </td>
                    <td>
                        <a href="{{ url('/genres/'.$genre->id.'/edit') }}">Edit</a>
                    </td>
                    <td>
                        <a href="{{ url('/genres/'.$genre->id) }}" onclick="event.preventDefault();document.getElementById('delete-genre').submit();">
                            Delete
                        </a>
                        <form id="delete-genre" action="{{ url('/genres/'.$genre->id) }}" method="POST" style="display: none;">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center">{{ $genres->links() }}</div>
@endsection
