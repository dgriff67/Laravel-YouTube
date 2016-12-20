@extends('layouts.app')
@section('title', 'View a favourite')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
            <div class="well well bs-component">
                <div class="content">
                    <h2 class="header">{!! $favourite->title !!}</h2>
                    <p> {!! $favourite->videoid !!} </p>
                    <p> {!! $favourite->user_id !!} </p>
                </div>
                <a href="{!! action('FavouritesController@edit', $favourite->id) !!}" class="btn btn-info">Edit</a>
                <form method="post" action="{!! action('FavouritesController@destroy', $favourite->id) !!}" class="pull-left">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div>
                            <button type="submit" class="btn btn-warning">Delete</button>
                        </div>
                </form>
            </div>
    </div>
    <div class="well well bs-component">
                <form class="form-horizontal" method="post" action="/tag">

                    @foreach($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach

                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                    <fieldset>
                        <legend>Tag</legend>
                        <div class="form-group">
                            <label for="name" class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" id="name" placeholder="Tag" name="name">
                            </div>
                            <label for="name" class="col-lg-2 control-label">User_id</label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" id="user_id" placeholder="User_id" name="user_id">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-primary">Tag</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
@endsection
