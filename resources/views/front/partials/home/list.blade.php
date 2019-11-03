<div class="content-timeline">

    <div class="post-list-header">
        <span class="post-list-title">Latest books</span>
    </div>

    <div class="post-lists">

        @foreach($books as $book)

            <div class="columns column-2">
                <div class="post-list-item">
                    <div class="post-top">
                        <img class="post-image" src="{{ asset($book->image) }}">
                        <h3 class="post-title">
                            <a href="#"><span>{{ $book->title }}</span></a>
                        </h3>
                    </div>
                    <div class="post-bottom">
                        <div class="post-author-box">
                            @foreach($book->genres as $genre)
                                <a href="{{ url('/').'?genre='.$genre->name }}" class="author-name">$genre->name</a>
                            @endforeach
                        </div>
                        <div class="post-meta">
                            <a href="#" class="read-more">Details <i class="material-icons"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

    </div>

    <div class="text-center">{{ $books->links() }}</div>

</div>
