<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">


    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <title>Blog</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/blog.css') }}">
</head>

<body>
<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{Route('home')}}">Blog</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse navbar-right ">
            <ul class=" nav navbar-nav">

                <li><a href="{{Route('home')}}">Home</a></li>
                @if(auth::guest())
                <li><a href="{{ url('/login') }}">Aanmelden</a></li>
                <li><a href="{{ url('/register') }}">Registeren</a></li>
                @else
                <li ><a href="about">About</a></li>
                <li><a href="Contact">Contact</a></li>
                @if(Auth::check() && Auth::user()->IsAdmin())
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        Admin <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('admin/users') }}">Users</a></li>
                        <li><a href="{{ url('admin/posts') }}">Posts</a></li>
                        <li><a href="{{ url('admin/comments') }}">Comments</a></li>
                    </ul>
                </li>
                    @endif
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        Welcome, {{auth()->user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('create') }}">New Post</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('manage/post') }}">Show Posts</a></li>
                        <li><a href="{{ url('manage/comments') }}">Show Comments</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form"
                                  action="{{ url('/logout') }}"
                                  method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
            @endif
        </div>
    </div>
</nav>

@yield('content')

<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

@yield('scripts')
</body>
</html>