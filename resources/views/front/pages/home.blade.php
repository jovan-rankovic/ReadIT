@extends('layouts.front')

@section('content')
    <div class="content-body">
        @include('front.partials.home.list')
    </div>

    <div class="content-sidebar">
        @include('front.partials.home.sidebar')
    </div>
@endsection
