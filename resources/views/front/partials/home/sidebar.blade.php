<div class="sidebar_inner">
    <div class="widget-item">
        <div class="w-header">
            <div class="w-title">Genres</div>
        </div>
        <div class="w-boxed-post">
            <ul>
                @foreach ($genres as $genre)
                    <li>
                        <a href="{{ url('/').'?genre='.$genre->id }}">
                            <div class="box-wrapper">
                                <div class="box-left">
                                </div>
                                <div class="box-right">
                                    <h3 class="p-title">{{ $genre->name }}</h3>
                                    <div class="p-icons">
                                        {{ $genre->books->count() }} books
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
