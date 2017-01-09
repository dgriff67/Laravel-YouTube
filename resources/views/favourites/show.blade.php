@extends('layouts.app')
@section('title', 'View favourite')
@section('content')
    <div class="container col-md-4">
            <div class="well well bs-component">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div>
                    @if ($favourite->kind == 'youtube#video')
                        <iframe frameborder="0" src="https://www.youtube.com/embed/{!! $favourite->videoid!!}?autoplay=1" allowfullscreen="allowfullscreen" width="320" height="240" frameborder="0">
                        </iframe>
                    @endif
                    @if ($favourite->kind == 'youtube#playlist')
                        <iframe frameborder="0" src="https://www.youtube.com/embed/videoseries?list={!! $favourite->videoid!!}&index=0" allowfullscreen="allowfullscreen" width="320" height="240" frameborder="0">
                        </iframe>
                    @endif
                </div>
                <div class="content">
                    <h2 class="header">{{ $favourite->title }}</h2>
                    @if ($favourite->tags->isEmpty())
                        <p>Use the edit button below to add tags or to change the title<p>
                    @else
                        @foreach($favourite->tags->sortBy('name') as $tag)
                            <a href="{!! action('TagsController@show', $tag->id) !!}">{{ $tag->name }} </a>
                        @endforeach
                    @endif
                </div>
                <br>
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
