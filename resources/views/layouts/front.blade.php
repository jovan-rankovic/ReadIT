<!DOCTYPE html>
<html>
<head>
    @include('front.partials.common.head')
</head>
<body>
    <header class="header">
        @include('front.partials.common.header')
    </header>

    <div class="sidebar">
        @include('front.partials.common.sidebar')
    </div>

    <main class="main-container">
        <section class="main-content">
            <div class="main-content-wrapper">
                @yield('content')
            </div>
        </section>
    </main>

    <div class="overlay"></div>

    @include('front.partials.common.scripts')
</body>
</html>
