@extends('layouts/default')
@section('content')

    <div class="container first-container">

        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Comments (admin)
                        <small>list of all comments</small></h1>
                </div>
                @foreach($comments as $comment)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>{{$comment->post->title}}</h3>
                                    <h4>reactie:</h4>
                                    <p>{{ $comment->comment }}</p>
                                </div>

                                <div class="col-md-1">

                                    <a href="{{ route('commentedit', ['id' => $comment->id]) }}"><button class="btn btn-default btn-ui "><span class="glyphicon glyphicon-pencil icon-large"></span></button></a>
                                </div>
                                <div class="col-md-1">

                                    {{--{{Form::open([ 'method'  => 'delete', 'route' => [ 'items.destroy', $item->id ] ])}}--}}
                                    {{--{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}--}}
                                    {{--{{ Form::close() }}--}}

                                    <form  method="DELETE" action="{{ route('commentdelete', ['id' => $comment->id]) }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <button type="submit" class="btn btn-default  btn-ui"><span class="glyphicon glyphicon-trash icon-large" aria-hidden="true"></span></button>
                                    </form>
                                    {{--<a href="{{ route('commentdelete', ['id' => $comment->id]) }}"><span class="glyphicon glyphicon-trash icon-large"></span></a>--}}
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