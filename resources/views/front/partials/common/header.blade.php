<div class="header-wrapper">

    <!--sidebar menu toggler start -->
    <div class="toggle-sidebar material-button">
        <i class="material-icons">&#xE5D2;</i>
    </div>
    <!--sidebar menu toggler end -->
    <!--logo start -->
    <div class="logo-box">
        <h1 id="WebNews">
            <a href="{{ url('/') }}" class="logo">ReadIT</a>
        </h1>
    </div>
    <!--logo end -->

    <div class="header-menu">

        <!-- header left menu start -->
        <ul class="header-navigation" data-show-menu-on-mobile>
        </ul>
        <!-- header left menu end -->

    </div>
    <div class="header-right with-seperator">

        <!-- header right menu start -->
        <ul class="header-navigation">
            <li>
                <a href="#" class="material-button search-toggle"><i class="material-icons">&#xE8B6;</i></a>
            </li>
            @if (Route::has('login'))
                @auth
                    <li>
                        <a href="#" class="material-button submenu-toggle"><i class="material-icons"></i> <span class="hide-on-tablet">{{ Auth::user()->name }} <span class="caret"></span></span></a>
                        <div class="header-submenu" style="display: block;">
                            <ul>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
            @else
            <li>
                <a href="#" class="material-button submenu-toggle"><i class="material-icons"></i> <span class="hide-on-tablet">Account</span></a>
                <div class="header-submenu" style="display: block;">
                    <ul>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    </ul>
                </div>
            </li>
                @endauth
            @endif
        </ul>
        <!-- header right menu end -->

    </div>

    <!--header search panel start -->
    <div class="search-bar">
        <form class="search-form">
            <div class="search-input-wrapper">
                <input type="text" name="title" placeholder="search books by title..." class="search-input" />
                <button type="submit" class="search-submit"><i class="material-icons">&#xE5C8;</i></button>
            </div>
            <span class="search-close search-toggle">
                <i class="material-icons">&#xE5CD;</i>
            </span>
        </form>
    </div>
    <!--header search panel end -->

</div>
