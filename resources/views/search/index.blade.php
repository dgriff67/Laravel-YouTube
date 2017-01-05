@extends('layouts.app')
@section('title', 'Search')

@section('content')
    <div class="container col-md-8 ">
        <div class="well well bs-component">
            <form class="form-horizontal" method="get">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <legend>Search</legend>
                    <div class="form-group">
                        <div class="col-lg-8">
                            <input type="search" class="form-control" id="q" placeholder="Enter search term" name="q" value="{{ old('q')}}">
                        </div>
                        <div>
                            Max Results: <input type="number" id="maxResults" name="maxResults" min="1" max="10" step="1" value="{{ old('maxResults') ? old('maxResults') : 5 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-8 ">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            @if ($searchResponse === NULL)
            @else
                <table class="table">
                    @foreach($searchResponse as $searchResult)
                        <tr>
                            <td>
                                <form action="{{ route('search.play') }}" method="get">
                                {{ csrf_field() }}
                                        <div class="form-group">
                                            {{ Form::hidden('title', $searchResult['snippet']['title']) }}
                                            {{ Form::hidden('imageUrl', $searchResult['snippet']['thumbnails']['default']['url']) }}
                                            {{ Form::hidden('kind', $searchResult['id']['kind']) }}
                                            @if ($searchResult['id']['kind'] =='youtube#video')
                                                {{ Form::hidden('videoid', $searchResult['id']['videoId']) }}
                                            @endif
                                            @if ($searchResult['id']['kind'] =='youtube#channel')
                                                {{ Form::hidden('videoid', $searchResult['id']['channelId']) }}
                                            @endif
                                            @if ($searchResult['id']['kind'] =='youtube#playlist')
                                                {{ Form::hidden('videoid', $searchResult['id']['playlistId']) }}
                                            @endif
                                        </div>
                                    <input type="image" src="{!! $searchResult['snippet']['thumbnails']['default']['url'] !!}" alt="{!! $searchResult['snippet']['title'] !!}" style="width:width;height:height;">
                                </form>
                            </td>
                            <td>
                                {!! $searchResult['snippet']['title'] !!}
                            </td>
                            <td>
                                <form action="{{ route('favourite.create') }}" method="post">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            {{ Form::hidden('title', $searchResult['snippet']['title']) }}
                                            {{ Form::hidden('imageUrl', $searchResult['snippet']['thumbnails']['default']['url']) }}
                                            {{ Form::hidden('kind', $searchResult['id']['kind']) }}
                                            @if ($searchResult['id']['kind'] =='youtube#video')
                                                {{ Form::hidden('videoid', $searchResult['id']['videoId']) }}
                                            @endif
                                            @if ($searchResult['id']['kind'] =='youtube#channel')
                                                {{ Form::hidden('videoid', $searchResult['id']['channelId']) }}
                                            @endif
                                            @if ($searchResult['id']['kind'] =='youtube#playlist')
                                                {{ Form::hidden('videoid', $searchResult['id']['playlistId']) }}
                                            @endif
                                        </div>
                                    <button type="submit" class="btn btn-primary">Add Favourite</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection
