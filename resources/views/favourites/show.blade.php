@extends('layouts.app')
@section('title', 'View a favourite')
@section('content')
<!--<div style="overflow:hidden;height:270px;width:480px;max-width:100%;max-height:100%;">
    <div class="container col-md-4">
        <div id="youtube_canvas" style="height:100%;width:100%;max-width:100%">
        <iframe style="height:100%;width:100%;max-width:100%;border:0;" frameborder="0" src="https://www.youtube.com/embed/{!! $favourite->videoid !!}">
        </iframe>
    </div>
    <a class="youtube-embed-code" href="http://dedicatedhosting.pro" id="get-youtube-data">dedicated hosting reviews</a>
    <style>#youtube_canvas img{max-width:none!important;background:none!important}</style>
</div>-->
    <div class="container col-md-4">
            <div class="well well bs-component">
                <div>
                    <iframe frameborder="0" src="https://www.youtube.com/embed/{!! $favourite->videoid!!}?autoplay=1" allowfullscreen="allowfullscreen" width="320" height="240" frameborder="0">
                    </iframe>
                </div>
                <div class="content">
                    <h2 class="header">{!! $favourite->title !!}</h2>
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
