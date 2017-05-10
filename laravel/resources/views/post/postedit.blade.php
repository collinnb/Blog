@extends('layouts/default')
@section('content')
    <div class="container first-container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Nieuwe POST</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{{auth::user()->id }}">
                            <div class="form-group">
                                <label for="post-title">Titel</label>
                                <input type="text" id="post-title" class="form-control" name="title" value="{{$posts->title}}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="post-slug">Gegenereerde slug</label>
                                <input type="text" id="post-slug" class="form-control" name="slug" value="{{$posts->slug}}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="message-body">Tekst</label>
                                <textarea id="message-body" class="form-control" name="text">{!! $posts->text !!}</textarea>
                            </div>
                            <button type="submit" class="btn btn-default pull-right">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/editor.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/blog.js')}}"></script>
@stop