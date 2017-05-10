@extends('layouts/default')

@section('content')

    <div class="container first-container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Editing {{$user->name}}</h1>
                </div>
                <form  method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$user->id }}">
                    <div class="form-group">
                        <label for="name" class="col-md-2 control-label">Name</label>
                        <div class="col-md-10">
                            <input id="message-body" class="form-control" name="name" value="{{$user->name}}">
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-2 control-label">Email</label>
                        <div class="col-md-10">
                            <input id="message-body" class="form-control" name="email" value="{{$user->email}}">
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="role" class="col-md-2 control-label">Role</label>
                        <div class="col-md-10">
                            <input id="message-body" class="form-control" name="role" value="{{$user->role}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default pull-right">Update</button>
                </form>
            </div>
        </div>
    </div>

@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
@stop