@extends('master')
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
                <a href="#" class="btn btn-info">Delete</a>
            </div>
    </div>

@endsection
