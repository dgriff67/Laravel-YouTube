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
                                @if ($searchResult['id']['kind'] =='youtube#channel')
                                    <a href="https://www.youtube.com/channel/{!! $searchResult['id']['channelId'] !!}" target='_blank'><img src="{!! $searchResult['snippet']['thumbnails']['default']['url'] !!}" alt="{!! $searchResult['snippet']['title'] !!}" style="width:width;height:height;"></a>
                                @else
                                    <form action="{{ route('search.play') }}" method="get">
                                        {{ csrf_field() }}
                                            <div class="form-group">
                                                @include('shared.hidden_fields')
                                            </div>
                                        <input type="image" src="{!! $searchResult['snippet']['thumbnails']['default']['url'] !!}" alt="{!! $searchResult['snippet']['title'] !!}" style="width:width;height:height;">
                                    </form>
                                @endif

                            </td>
                            <td>

                                @if ($searchResult['id']['kind'] =='youtube#channel')
                                    <a href="https://www.youtube.com/channel/{!! $searchResult['id']['channelId'] !!}" target='_blank'>{!! $searchResult['snippet']['title'] !!}</a>
                                @else
                                    @if ($searchResult['id']['kind'] =='youtube#video')
                                        {!! link_to_route('search.play', $searchResult['snippet']['title'], $parameters = array(
                                        'title'=> $searchResult['snippet']['title'],
                                        'imageUrl'=> $searchResult['snippet']['thumbnails']['default']['url'],
                                        'kind'=> $searchResult['id']['kind'],
                                        'videoid'=> $searchResult['id']['videoId'])) !!}
                                    @else
                                        {!! link_to_route('search.play', $searchResult['snippet']['title'], $parameters = array(
                                        'title'=> $searchResult['snippet']['title'],
                                        'imageUrl'=> $searchResult['snippet']['thumbnails']['default']['url'],
                                        'kind'=> $searchResult['id']['kind'],
                                        'videoid'=> $searchResult['id']['playlistId'])) !!}
                                    @endif
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('favourite.create') }}" method="post">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            @include('shared.hidden_fields')
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
