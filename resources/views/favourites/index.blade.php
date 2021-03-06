@extends('layouts.app')
@section('title', 'View Favourites ')
@section('content')

    <div class="container col-md-8">
            <div class="well well bs-component">
                <div>
                    <h2> Favourites @if ($tag == '') - All @else - {{ $tag->name }} @endif </h2>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($favourites->isEmpty())
                    <p> There are no favourites @if ($tag == '') @else with tag: {{ $tag->name }} @endif.</p>
                @else
                    <table class="table">
                        @foreach($favourites->sortByDesc('created_at') as $favourite)
                            <tr>
                                <td>
                                    @if ($favourite->kind == 'youtube#channel')
                                        <a href="https://www.youtube.com/channel/{!! $favourite->videoid !!}" target='_blank'><img src="{!! $favourite->imageUrl !!}" alt="{{ $favourite->title }}" style="width:width;height:height;"></a>
                                    @else
                                        <a href="{!! action('FavouritesController@show', $favourite->id) !!}"><img src="{!! $favourite->imageUrl !!}" alt="{{ $favourite->title }}" style="width:width;height:height;"></a>
                                    @endif
                                </td>
                                <td>
                                    @if ($favourite->kind == 'youtube#channel')
                                        <a href="https://www.youtube.com/channel/{!! $favourite->videoid !!}" target='_blank'>{{ $favourite->title }} <br> </a>
                                    @else
                                        <a href="{!! action('FavouritesController@show', $favourite->id) !!}">{{ $favourite->title }} </a>
                                        <br>
                                            @foreach($favourite->tags->sortBy('name') as $tag)
                                                <a href="{!! action('TagsController@show', $tag->id) !!}">{{ $tag->name }} </a>
                                            @endforeach
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
                {{ $favourites->links() }}
                @if ($tag == '')
                @else
                <form action="{{ route('tag.delete', $tag->id) }}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Delete Tag</button>
                </form>
                @endif
            </div>
    </div>

@endsection
