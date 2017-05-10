@extends('layouts/default')

@section('content')
    <div class="container first-container">

        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Users (admin)
                        <small>list of all users</small></h1>
                </div>
                @foreach($users as $user)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-10">
                                <h3>{{$user->name}}</h3>
                                @if($user->role == 1)
                                <p>role: Admin</p>
                                @else
                                <p>role: User</p>
                                @endif
                            </div>

                            <div class="col-md-1">

                                <a href="{{ route('Usersedit', ['id' => $user->id]) }}"><button class="btn btn-default btn-ui "><span class="glyphicon glyphicon-pencil icon-large"></span></button></a>
                            </div>
                            <div class="col-md-1">

                                {{--{{Form::open([ 'method'  => 'delete', 'route' => [ 'items.destroy', $item->id ] ])}}--}}
                                {{--{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}--}}
                                {{--{{ Form::close() }}--}}

                                <form  method="DELETE" action="{{ route('Usersdelete', ['id' => $user->id]) }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <button type="submit" class="btn btn-default  btn-ui"><span class="glyphicon glyphicon-trash icon-large" aria-hidden="true"></span></button>
                                </form>
                                {{--<a href="{{ route('commentdelete', ['id' => $comment->id]) }}"><span class="glyphicon glyphicon-trash icon-large"></span></a>--}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
            @endforeach
    </div>
@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
@stop