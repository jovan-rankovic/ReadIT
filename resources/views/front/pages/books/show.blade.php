@extends('layouts.front')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Title -->
                <h1 class="mt-4">{{ $book->title }}</h1>

                <!-- Date/Time -->
                <p>Published on {{ $book->created_at->format('d.m.Y.') }}</p>

                <hr/>

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="{{ asset($book->image) }}" alt="Book image">

                <hr/>

                <!-- Post Content -->
                <p>{{ $book->description }}</p>

                <hr/>

                @auth
                    <button class="btn btn-success">Check Out</button>
                    <button class="btn btn-danger">Check In</button>
                @endauth
                <b>Currently unavailable.</b>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <div class="card my-4">
                    <h5 class="card-header">Actions</h5>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="{{ url('/books/create') }}">Add a new book</a>
                            </li>
                            <li>
                                <a href="{{ url('/books/'.$book->id.'/edit') }}">Edit this book</a>
                            </li>
                            <li>
                                <a href="{{ url('/books/'.$book->id) }}" onclick="event.preventDefault();document.getElementById('delete-book').submit();">
                                    Remove this book
                                </a>
                                <form id="delete-book" action="{{ url('/books/'.$book->id) }}" method="POST" style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Genres</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($book->genres as $genre)
                                        <li><a href="{{ url('/').'?genre='.$genre->id }}">{{ $genre->name }}</a></li>
                                    @endforeach
                                    <hr/>
                                    <li>
                                        <a href="{{ url('/genres') }}">Genre list</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection
