@extends('layouts.app')
@section('title', 'View all Favourites')
@section('content')

    <div class="container col-md-8">
            <div class="well well bs-component">
                <div>
                    <h2> Favourites </h2>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($favourites->isEmpty())
                    <p> There are no favourites.</p>
                @else
                    <table class="table">
                        @foreach($favourites as $favourite)
                            <tr>
                                <td>
                                    @if ($favourite->kind == 'youtube#channel')
                                        <a href="https://www.youtube.com/channel/{!! $favourite->videoid !!}" target='_blank'><img src="{!! $favourite->imageUrl !!}" alt="{!! $favourite->title !!}" style="width:width;height:height;"></a>
                                    @else
                                        <a href="{!! action('FavouritesController@show', $favourite->id) !!}"><img src="{!! $favourite->imageUrl !!}" alt="{!! $favourite->title !!}" style="width:width;height:height;"></a>
                                    @endif
                                </td>
                                <td>
                                    @if ($favourite->kind == 'youtube#channel')
                                        <a href="https://www.youtube.com/channel/{!! $favourite->videoid !!}" target='_blank'>{!! $favourite->title !!} <br> {!!$favourite->tag_string !!}</a>
                                    @else
                                        <a href="{!! action('FavouritesController@show', $favourite->id) !!}">{!! $favourite->title !!} <br>{!!$favourite->tag_string !!} </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
    </div>

@endsection
