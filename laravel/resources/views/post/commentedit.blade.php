@extends('layouts/default')

@section('content')

<div class="container first-container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Nieuwe reactie</h1>
            </div>
            <form  method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$comments->id }}">
                <div class="form-group">
                    <textarea id="message-body" class="form-control" name="comment">{{$comments->comment}}</textarea>
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