@extends('layouts/default')

@section('content')

    <div class="container first-container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>{{ $post->title }}</h1>
                </div>
                <p>{!! $post->text !!}</p>
                <span class="post-author-postedon">{{ $post->user->name }}</span>
            </div>
        </div>
    </div>
    @if(Auth::check())
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Nieuwe reactie</h1>
                </div>
                <form  method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{auth::user()->id }}">
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <div class="form-group">
                        <textarea id="message-body" class="form-control" name="comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default pull-right">React</button>
                </form>
            </div>
        </div>
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Reacties</h1>
                </div>
                @foreach($post->comments as $comment)
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-12">

                                <p>{{ $comment->comment }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
  									<span class="post-author-postedon">
  										{{ $comment->user->name }}
  									</span>
                            </div>

                        </div>

                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
@stop
