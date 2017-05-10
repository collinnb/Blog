@extends('layouts/default')

@section('content')
    <div class="container first-container">
        <div class="jumbotron">
            <h1>Blog</h1>
            <p>Welcome to my blog, I made this blog because I wanned to learn more about the PHP framework Laravel, you can make here een account to post your own posts </p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Blog Posts
                        <small></small></h1>
                </div>
                @foreach($posts as $post)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>{{ $post->title }}</h3>
                            <div class="row">
                                <div class="col-md-11">
                                    <p class="first-line-of-post">{!! str_limit($post->text, $limit = 100, $end = '...') !!}</p>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{ route('onepost', ['id' => $post->id]) }}"><span class="glyphicon glyphicon-eye-open icon-large"></span></a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- EIND VAN EEN POST -->
                @endforeach

            </div>
        </div>
    </div>
@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
@stop