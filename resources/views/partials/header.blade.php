<nav class="navbar navbar-custom navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a href="{{ route('blog.index') }}" class="navbar-brand">
                <h1 class="upper">{{ strtoupper(config('app.name')) }}</h1>
            </a>
        </div>

        <div class="collapse navbar-collapse navbar-right navbar-main-collapse" id="app-navbar-collapse">
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="//mtwilliams.uk">About</a></li>
                <li><a href="{{ route('blog.index') }}">Blog</a></li>
                <li><a href="//mtwilliams.uk/portfolio">Portfolio</a></li>
                <li><a href="//mtwilliams.uk#contact">Contact</a></li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Login <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu signin-dropdown" role="menu">
                            @include('partials.auth.login')
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Register <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu signin-dropdown" role="menu">
                            @include('partials.auth.register')
                        </ul>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('admin.create') }}">
                                <i class="fa fa-plus-circle fa-fw"></i>
                                New Post
                            </a></li>
                            <li><a href="{{ route('admin.index') }}">
                                <i class="fa fa-dashboard fa-fw"></i>
                                Dashboard
                            </a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out fa-fw"></i>
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@if (Request::is('admin*'))
    <div class="container">
        <ul class="nav nav-pills nav-justified">
            <li role="presentation"{{ (Route::is('admin.index' )) ? ' class=active' : '' }} >
                <a href="{{ (Route::is('admin.index')) ? '#' : route('admin.index') }}">Manage Posts</a>
            </li>
            <li role="presentation"{{ (Route::is('admin.tags.index')) ? ' class=active' : '' }} >
                <a href="{{ (Route::is('admin.tags.index')) ? '#' : route('admin.tags.index') }}">Manage Tags</a>
            </li>
            <li role="presentation"{{ (Route::is('admin.users.index')) ? ' class=active' : '' }} >
                <a href="{{ (Route::is('admin.users.index')) ? '#' : route('admin.users.index') }}">Manage Users</a>
            </li>
        </ul>
    </div>
@endif