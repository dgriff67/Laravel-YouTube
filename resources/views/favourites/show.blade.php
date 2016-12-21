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
@endsection
