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

                @if($book->reserved == false)
                    <b class="text-success">Available.</b>
                @else
                    <b class="text-danger">Currently unavailable.</b>
                @endif

                <br/><br/>

                @auth
                    @if($book->reserved == false)
                        <button class="btn btn-success" onclick="document.getElementById('book-reservation').submit();">Reserve</button>
                        <form id="book-reservation" action="{{ url('/books/'.$book->id.'/reserve') }}" method="POST" style="display: none;">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}" />
                            <input type="hidden" name="user" value="{{ Auth::user()->name }}" />
                        </form>
                    @endif
                    @if($book->user_id == Auth::id() || Auth::user()->role->name == 'Admin')
                        <button class="btn btn-danger" onclick="document.getElementById('book-return').submit();">Return</button>
                        <form id="book-return" action="{{ url('/books/'.$book->id.'/return') }}" method="POST" style="display: none;">
                            @method('PATCH')
                            @csrf
                        </form>
                    @endif
                @endauth

            </div>

            <!-- Sidebar Widgets Column -->
                <div class="col-md-4">

                @if(Auth::user()->role->name == 'Admin')
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
                @endif

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
                                    @if(Auth::user()->role->name == 'Admin')
                                        <hr/>
                                        <li>
                                            <a href="{{ url('/genres') }}">Genre list</a>
                                        </li>
                                    @endif
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
